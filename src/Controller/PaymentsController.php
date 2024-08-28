<?php
declare(strict_types=1);

namespace App\Controller;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Stripe\StripeClient;
use Cake\Mailer\Mailer;

/**
 * Payments Controller
 *
 * @property \App\Model\Table\PaymentsTable $Payments
 * @property \App\Model\Table\CoursesTable $Courses
 * @property \App\Model\Table\BookingsTable $Bookings
 */
class PaymentsController extends AppController
{
    private \Cake\ORM\Table $Courses;
    private \Cake\ORM\Table $Bookings;

        public function initialize(): void
    {
        parent::initialize();

        $this->Authentication->allowUnauthenticated(['checkout','success', 'fail']);
        $this->Courses= TableRegistry::getTableLocator()->get('Courses');
        $this->Bookings= TableRegistry::getTableLocator()->get('Bookings');

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Payments->find()
            ->contain(['Bookings']);
        $payments = $this->paginate($query);

        $this->set(compact('payments'));
    }

    /**
     * View method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payment = $this->Payments->get($id, contain: ['Bookings']);
        $this->set(compact('payment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payment = $this->Payments->newEmptyEntity();
        if ($this->request->is('post')) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $bookings = $this->Payments->Bookings->find('list', limit: 200)->all();
        $this->set(compact('payment', 'bookings'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payment = $this->Payments->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payment = $this->Payments->patchEntity($payment, $this->request->getData());
            if ($this->Payments->save($payment)) {
                $this->Flash->success(__('The payment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The payment could not be saved. Please, try again.'));
        }
        $bookings = $this->Payments->Bookings->find('list', limit: 200)->all();
        $this->set(compact('payment', 'bookings'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payment = $this->Payments->get($id);
        if ($this->Payments->delete($payment)) {
            $this->Flash->success(__('The payment has been deleted.'));
        } else {
            $this->Flash->error(__('The payment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function checkout($course_id) {
        $this->viewBuilder()->disableAutoLayout();
        Stripe::setApiKey('sk_test_51PnfYBHtFQ126a2JACHCRvlLDksG752hMQYdxCkoHDtqavhxcA5WHMmXqX7iVa0PgrrieQS0w5uGch0n0jLsD0ST00PMNE3Zwp');

        $course = $this->Courses->get($course_id);

        $line_items = [
            [
                'price_data' => [
                    'product_data' => [
                        'name' => $course['course_name'],
                    ],
                    'currency' => 'AUD',
                    'unit_amount' => $course['course_price'] * 100,  // Convert price to cents
                ],
                'quantity' => 1,
            ],
        ];

        $booking = $this->Bookings->newEmptyEntity();

        $booking = $this->Bookings->patchEntity($booking, [
            'course_id' => $course_id,
            'booking_type' => 'online'
        ]);

        $this->Bookings->save($booking);

        $payment = $this->Payments->newEmptyEntity();

        $payment = $this->Payments->patchEntity($payment, [
            'payment_amount' => $this->Courses->get($course_id)['course_price'],
            'payment_datetime' => new \DateTime(),
            'booking_id' => $booking->booking_id
        ]);

        $this->Payments->save($payment);

        $checkout_session = Session::create([
            'success_url' => Router::url(['controller' => 'Payments', 'action' => 'success', $payment->payment_id], true),
            'cancel_url' => Router::fullBaseUrl(),
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'line_items' => $line_items,
            'customer_creation' => 'always'
        ]);

        $payment = $this->Payments->patchEntity($payment, [
            'payment_amount' => $this->Courses->get($course_id)['course_price'],
            'payment_datetime' => new \DateTime(),
            'booking_id' => $booking->booking_id,
            'checkout_id' => $checkout_session['id']
        ]);

        $this->Payments->save($payment);

        $this->set('sessionId', $checkout_session['id']);
    }

    public function success($paymentID='help')
    {
        $this->viewBuilder()->disableAutoLayout();

        $payment = null;

        try {
            $payment = $this->Payments->get($paymentID);
        } catch (\Exception $e) {
            return $this->redirect(['action' => 'fail']);
        }

        $checkoutID = $payment->checkout_id;

        Stripe::setApiKey('sk_test_51PnfYBHtFQ126a2JACHCRvlLDksG752hMQYdxCkoHDtqavhxcA5WHMmXqX7iVa0PgrrieQS0w5uGch0n0jLsD0ST00PMNE3Zwp');

        $session = Session::retrieve($checkoutID);
        $stripe = new \Stripe\StripeClient('sk_test_51PnfYBHtFQ126a2JACHCRvlLDksG752hMQYdxCkoHDtqavhxcA5WHMmXqX7iVa0PgrrieQS0w5uGch0n0jLsD0ST00PMNE3Zwp');

        $customer = $stripe->customers->retrieve($session->customer);

        $email = $customer->email;
        $name = $customer->name;

        $payment->payment_email = $email;

        $this->Payments->save($payment);

        $mailer = new Mailer('default');

        $mailer
            ->setEmailFormat('html')
            ->setTo($email)
            ->setFrom('noreply@sabe.u24s1009.iedev.org')
            ->setSubject('South Adelaide Beauty and Education: Payment Confirmation')
            ->viewBuilder()
            ->disableAutoLayout()
            ->setTemplate('payment_confirmation');

        $mailer->setViewVars([
            'name' => $name
        ]);


        try {
            dd('hello');
            $email_result = $mailer->deliver();

            dd($email_result);

            if($email_result) {
                $this->set('message', 'Thank you for your payment! You will receive your login credentials within 24 hours!');
            } else {
                $this->set('message', 'Payment confirmation failed to send, please ensure that you have entered the correct email address.');
                $this->Bookings->delete($this->Bookings->get($payment->booking_id));
                $this->Payments->delete($payment);

                return $this->redirect(['action' => 'fail']);
            }
        } catch (\Throwable $th) {
            dd('how');
            $this->Bookings->delete($this->Bookings->get($payment->booking_id));
            $this->Payments->delete($payment);

            return $this->redirect(['action' => 'fail']);
        }
    }

    public function fail() {
        $this->viewBuilder()->disableAutoLayout();
    }

}


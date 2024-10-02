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
 * @property \App\Model\Table\UsersTable $Users
 */
class PaymentsController extends AppController
{
    private \Cake\ORM\Table $Courses;
    private \Cake\ORM\Table $Users;

        public function initialize(): void
    {
        parent::initialize();

        //$this->Authentication->allowUnauthenticated(['checkout','success', 'fail']);
        $this->Courses= TableRegistry::getTableLocator()->get('Courses');
        $this->Users = TableRegistry::getTableLocator()->get('Users');
        $this->response = $this->response->withHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->withHeader('Cache-Control', 'post-check=0, pre-check=0', false)
            ->withHeader('Pragma', 'no-cache');

    }

    protected function restrict()
    {
        $user = $this -> Authentication -> getIdentity() ->getOriginalData();
        $userID = $user['User'];
        $user = $this->Users->get($userID);
        $userType = $user->user_type;
        if($userType == 'student') {
            return $this->redirect(['controller' => 'studentDashboard', 'action' => 'dashboard']);
        }
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->restrict();
        $query = $this->Payments->find()
            ->contain(['Courses', 'Users']);
        $payments = $this->paginate($query);

        $courses = $this->Courses->find()->toArray();

        $this->set(compact('payments', 'courses'));
    }

    public function enrollments() {
        $this->restrict();
        $query = $this->Payments->find()->where(['Payments.archived IS' => 0])->contain(['Courses', 'Users']);
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
        $payment = $this->Payments->get($id);
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
        $this->set(compact('payment'));
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
        $this->set(compact('payment'));
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

        // Get user id for payment
        $user = $this -> Authentication -> getIdentity() ->getOriginalData();
        $userID = $user['User'];
        $user = $this->Users->get($userID);
        $email = $user->email;

        // Check if the user has already purchased the course
        $checkPayments = $this->Payments->find()->where(['course_id IS' => $course_id, 'user_id IS' => $userID['id']])->toArray();
        if($checkPayments) {
            // Student already owns this course -> redirect to course page
            return $this->redirect(['controller' => 'Courses', 'action' => 'accesscourse', $course_id]);
        }

        $payment = $this->Payments->newEmptyEntity();

        $payment = $this->Payments->patchEntity($payment, [
            'payment_amount' => $this->Courses->get($course_id)['course_price'],
            'payment_datetime' => new \DateTime(),
            'course_id' => $course_id,
            'user_id' => $user->user_id,
            'payment_email' => $email,
            'checkout_id' => 'null'
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
            'course_id' => $course_id,
            'user_id' => $userID,
            'checkout_id' => $checkout_session['id']
        ]);

        $this->Payments->save($payment);

        $this->set('sessionId', $checkout_session['id']);
    }

    public function success($paymentID)
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

        // $session = Session::retrieve($checkoutID);
        // $stripe = new \Stripe\StripeClient('sk_test_51PnfYBHtFQ126a2JACHCRvlLDksG752hMQYdxCkoHDtqavhxcA5WHMmXqX7iVa0PgrrieQS0w5uGch0n0jLsD0ST00PMNE3Zwp');

        // $customer = $stripe->customers->retrieve($session->customer);

        // $customer = $this->Users->get($payment->user_id);

        $course = $this->Courses->get($payment->course_id);

        $user = $this->Users->get($payment->user_id);

        $email = $user->email;
        $name = $user->user_firstname . ' ' . $user->user_surname;

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
            'name' => $name,
            'courseID' => $course->course_id,
            'courseName' => $course->course_name,
            'courseURL' => Router::url(['controller' => 'Courses', 'action' => 'accesscourse', $course->course_id], true)
        ]);

        try {
            $email_result = $mailer->deliver();

            if($email_result) {
                $this->set('message', 'Thank you for your payment! You will receive your login credentials within 24 hours!');
            } else {
                $this->set('message', 'Payment confirmation failed to send, please ensure that you have entered the correct email address.');
                $this->Payments->delete($payment);

                return $this->redirect(['controller' => 'Payments', 'action' => 'fail']);
            }
        } catch (\Throwable $th) {
            $this->Payments->delete($payment);

            return $this->redirect(['controller' => 'Payments', 'action' => 'fail']);
        }
    }

    public function fail() {
        $this->viewBuilder()->disableAutoLayout();
    }

    public function toggle($id = null) {
        $this->request->allowMethod(['get']);
        $payment = $this->Payments->get($id);

        $payment->payment_seen = $payment->payment_seen ? 0 : 1;

        if ($this->Payments->save($payment)) {
            $this->Flash->success(__('Payment status updated successfully.'));
        } else {
            $this->Flash->error(__('Failed to update payment status. Please try again.'));
        }

        $this->redirect(['action' => 'index']);
    }

    public function archive($id = null) {
        $this->request->allowMethod(['post']);
        $payment = $this->Payments->get($id);
        if($payment->archived == 1) {
            // Unarchive
            $payment->archived = 0;
            $this->Flash->success(__('The course has been unarchived.'));
        } else {
            // Archive
            $payment->archived = 1;
            $this->Flash->success(__('The course has been archived.'));
        }

        $this->Payments->save($payment);

        return $this->redirect(['action' => 'enrollments']);
    }

    public function archived() {
        $query = $this->Payments->find()->where(['Payments.archived IS' => 1])->contain(['Courses', 'Users']);
        $payments = $this->paginate($query);

        $this->set(compact('payments'));
    }

}


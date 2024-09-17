<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\I18n\DateTime;
use Cake\Mailer\Mailer;
use Cake\Utility\Security;

/**
 * Auth Controller
 *
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
class AuthController extends AppController
{
    /**
     * @var \App\Model\Table\UsersTable $Users
     */
    private UsersTable $Users;

    /**
     * Controller initialize override
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        // By default, CakePHP will (sensibly) default to preventing users from accessing any actions on a controller.
        // These actions, however, are typically required for users who have not yet logged in.
        $this->Authentication->allowUnauthenticated(['login', 'register', 'forgetPassword', 'changePassword', 'resetPassword']);

        // CakePHP loads the model with the same name as the controller by default.
        // Since we don't have an Auth model, we'll need to load "Users" model when starting the controller manually.
        $this->Users = $this->fetchTable('Users');
    }

    /**
     * Register method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        // Process user registration
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->user_type = 'student';  // Default user type

            if ($this->Users->save($user)) {
                $this->Authentication->setIdentity($user);  // Log in the user

                return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
            }

            $this->Flash->error('Registration failed. Please try again.');
        }

        $this->set(compact('user'));
    }




    /**
     * Forget Password method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful email send, renders view otherwise.
     */
    public function forgetPassword()
    {
        if ($this->request->is('post')) {
            $recaptchaSecret = '6Lc7pCgqAAAAAGQom2tHow31Z-fEEPh5dU7q8S3J'; // Replace with your reCAPTCHA secret key
            $recaptchaResponse = $this->request->getData('g-recaptcha-response');
            $remoteIp = $this->request->clientIp();

            $response = $this->verifyRecaptcha($recaptchaSecret, $recaptchaResponse, $remoteIp);

            // Return if user doesn't complete captcha
            if(!$response->success) {
                return $this->Flash->error('Please verify that you are not a robot');
            }

            // Retrieve the user entity by provided email address
            $user = $this->Users->findByEmail($this->request->getData('email'))->first();
            if ($user) {
                // Set nonce and expiry date
                $user->nonce = Security::randomString(128);
                $user->nonce_expiry = new DateTime('7 days');
                if ($this->Users->save($user)) {
                    // Now let's send the password reset email
                    $mailer = new Mailer('default');

                    // email basic config
                    $mailer
                        ->setEmailFormat('both')
                        ->setTo($user->email)
                        ->setFrom('noreply@sabe.u24s1009.iedev.org')
                        ->setSubject('Reset your account password');

                    // select email template
                    $mailer
                        ->viewBuilder()
                        ->setTemplate('reset_password');

                    // transfer required view variables to email template
                    $mailer
                        ->setViewVars([
                            'first_name' => $user->user_firstname,
                            'last_name' => $user->user_surname,
                            'nonce' => $user->nonce,
                            'email' => $user->email,
                        ]);

                    //Send email
                    if (!$mailer->deliver()) {
                        // Just in case something goes wrong when sending emails
                        $this->Flash->error('We have encountered an issue when sending you emails. Please try again. ');

                        return $this->render(); // Skip the rest of the controller and render the view
                    }
                } else {
                    // Just in case something goes wrong when saving nonce and expiry
                    $this->Flash->error('We are having issue to reset your password. Please try again. ');

                    return $this->render(); // Skip the rest of the controller and render the view
                }
            }

            /*
             * **This is a bit of a special design**
             * We don't tell the user if their account exists, or if the email has been sent,
             * because it may be used by someone with malicious intent. We only need to tell
             * the user that they'll get an email.
             */
            $this->Flash->success('Please check your inbox (or spam folder) for an email regarding how to reset your account password. ');

            return $this->redirect(['action' => 'login']);
        }
    }

    /**
     * Reset Password method
     *
     * @param string|null $nonce Reset password nonce
     * @return \Cake\Http\Response|null|void Redirects on successful password reset, renders view otherwise.
     */
    public function resetPassword(?string $nonce = null)
    {
        $recaptchaSecret = '6Lc7pCgqAAAAAGQom2tHow31Z-fEEPh5dU7q8S3J'; // Replace with your reCAPTCHA secret key
        $recaptchaResponse = $this->request->getData('g-recaptcha-response');
        $remoteIp = $this->request->clientIp();

        $response = $this->verifyRecaptcha($recaptchaSecret, $recaptchaResponse, $remoteIp);

        // Return if user doesn't complete captcha
        if(!$response->success) {
            return $this->Flash->error('Please verify that you are not a robot');
        }

        $user = $this->Users->findByNonce($nonce)->first();

        // If nonce cannot find the user, or nonce is expired, prompt for re-reset password
        if (!$user || $user->nonce_expiry < DateTime::now()) {
            $this->Flash->error('Your link is invalid or expired. Please try again.');

            return $this->redirect(['action' => 'forgetPassword']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Users->patchEntity($user, $this->request->getData());

            // Also clear the nonce-related fields on successful password resets.
            // This ensures that the reset link can't be used a second time.
            $user->nonce = null;
            $user->nonce_expiry = null;

            if ($this->Users->save($user)) {
                $this->Flash->success('Your password has been successfully reset. Please login with new password. ');

                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error('The password cannot be reset. Please try again.');
        }

        $this->set(compact('user'));
    }

    /**
     * Change Password method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function changePassword()
    {
        $userId = $this->request->getSession()->read('Auth.User.id');
        $user = $this->Users->get($userId, ['contain' => []]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            // Check if current_password is set
            if (empty($data['current_password'])) {
                $this->Flash->error(__('Current password is required.'));
                return $this->redirect(['action' => 'changePassword']);
            }

            $currentPassword = $data['current_password'];
            $newPassword = $data['password'];

            // Verify current password
            if (!password_verify($currentPassword, $user->password)) {
                $this->Flash->error(__('Your current password is incorrect.'));
                return $this->redirect(['action' => 'changePassword']);
            }

            // Check if new password is the same as current password
            if (password_verify($newPassword, $user->password)) {
                $this->Flash->error(__('The new password cannot be the same as the current password.'));
                return $this->redirect(['action' => 'changePassword']);
            }

            // Used a different validation set in Model/Table file to ensure both fields are filled
            $user = $this->Users->patchEntity($user, $data, ['validate' => 'resetPassword']);
            if ($this->Users->save($user)) {
                $this->Flash->success('The password has been saved.');

                return $this->redirect(['controller' => 'Users', 'action' => 'view', $userId]);
            }
            $this->Flash->error('The password could not be saved. Please, try again.');
        }
        $this->set(compact('user'));
        $this->viewBuilder()->setLayout('student');
    }

    /**
     * Login method
     *
     * @return \Cake\Http\Response|null|void Redirect to location before authentication
     */
//    public function login()
//    {
//        $this->request->allowMethod(['get', 'post']);
//        $result = $this->Authentication->getResult();
//
//        // if user passes authentication, grant access to the system
//        if ($result && $result->isValid()) {
//            // set a fallback location in case user logged in without triggering 'unauthenticatedRedirect'
//            $fallbackLocation = ['controller' => 'Users', 'action' => 'index'];
//
//            // and redirect user to the location they're trying to access
//            return $this->redirect($this->Authentication->getLoginRedirect() ?? $fallbackLocation);
//        }
//
//        // display error if user submitted their credentials but authentication failed
//        if ($this->request->is('post') && !$result->isValid()) {
//            $this->Flash->error('Email address and/or Password is incorrect. Please try again. ');
//        }
//    }
//    public function login()
//    {
//        $this->set('pageTitle', 'South Adelaie Beauty & Education | Login');
//        $this->request->allowMethod(['get', 'post']);
//        $result = $this->Authentication->getResult();
//
//        if ($this->request->is('post')) {
//            // reCAPTCHA verification
//            $recaptchaSecret = '6Lc7pCgqAAAAAGQom2tHow31Z-fEEPh5dU7q8S3J'; // Replace with your reCAPTCHA secret key
//            $recaptchaResponse = $this->request->getData('g-recaptcha-response');
//            $remoteIp = $this->request->clientIp();
//
//            $response = $this->verifyRecaptcha($recaptchaSecret, $recaptchaResponse, $remoteIp);
//
//            if (!$response->success) {
//                $this->Flash->error('Please verify that you are not a robot.');
//            } else {
//                // Proceed with login if reCAPTCHA is valid
//                if ($result && $result->isValid()) {
//                    // Store the user ID in the session
//                    $user = $this->Authentication->getIdentity();
////                    debug($user); // Debugging statement
//
//                    $userId = $user->get('user_id');
//                    $this->request->getSession()->write('Auth.User.id', $userId);
////                    debug($this->request->getSession()->read('Auth.User.id')); // Debugging statement
//
//                    $this->Flash->success('Login successful.');
//                    return $this->redirect($this->Authentication->getLoginRedirect() ?? ['controller' => 'AdminDashboard', 'action' => 'dashboard']);
//                } else {
//                    $this->Flash->error('Email address and/or Password is incorrect. Please try again.');
//                }
//            }
//        }
//    }



    public function login()
    {
        $this->set('pageTitle', 'South Adelaie Beauty & Education | Login');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();

        if ($this->request->is('post')) {
            // reCAPTCHA verification
            $recaptchaSecret = '6Lc7pCgqAAAAAGQom2tHow31Z-fEEPh5dU7q8S3J'; // Replace with your reCAPTCHA secret key
            $recaptchaResponse = $this->request->getData('g-recaptcha-response');
            $remoteIp = $this->request->clientIp();

            $response = $this->verifyRecaptcha($recaptchaSecret, $recaptchaResponse, $remoteIp);

            if (!$response->success) {
                $this->Flash->error('Please verify that you are not a robot.');
            } else {
                // Proceed with login if reCAPTCHA is valid
                if ($result && $result->isValid()) {
                    // Store the user ID in the session
                    $user = $this->Authentication->getIdentity();
                    $userId = $user->get('user_id');
                    $this->request->getSession()->write('Auth.User.id', $userId);

                    $this->Flash->success('Login successful.');

                    // Redirect based on user_type
                    if ($user->get('user_type') === 'admin') {
                        return $this->redirect(['controller' => 'AdminDashboard', 'action' => 'dashboard']);
                    } elseif ($user->get('user_type') === 'student') {
                        return $this->redirect(['controller' => 'StudentDashboard', 'action' => 'dashboard']);
                    }
                } else {
                    $this->Flash->error('Email address and/or Password is incorrect. Please try again.');
                }
            }
        }
    }






    private function verifyRecaptcha($secret, $response, $remoteIp)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret'   => $secret,
            'response' => $response,
            'remoteip' => $remoteIp
        ];

        $options = [
            'http' => [
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result);
    }
    /**
     * Logout method
     *
     * @return \Cake\Http\Response|null|void
     */
    public function logout()
    {
        // We only need to log out a user when they're logged in
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();

            $this->Flash->success('You have been logged out successfully. ');
        }

        // Otherwise just send them to the login page
        return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
    }
}

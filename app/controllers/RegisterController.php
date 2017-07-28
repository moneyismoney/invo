<?php

/**
 * SessionController
 *
 * Allows to register new users
 */
class RegisterController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');
        parent::initialize();
    }

    /**
     * Action to register a new user
     */
    public function indexAction()
    {
        $form = new RegisterForm;

        if ($this->request->isPost()) {

            $name = $this->request->getPost('name', array('string', 'striptags'));
            $username = $this->request->getPost('username', 'alphanum');
            $email = $this->request->getPost('email', 'email');
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            if ($password != $repeatPassword) {
                $this->flash->error('Passwords are different');
                return false;
            }
            
            $type = $this->request->getPost('type');
            $business_type = $this->request->getPost('business_type');
            $number_of_invoices = $this->request->getPost('number_of_invoices');
            
            if ($type == 2){ //Business
                $number_of_invoices = '';
            }
            elseif ($type == 3) { //Freelancer
                $business_type = '';            
            }
            
//            if ($type == 2 and strlen($business_type) === 0){
//                $this->flash->error('Business type should not be empty');
//                return false;
//            }
//            
//            echo "Type = ".$type;
//            echo "Length of b_t = ". strlen($business_type);

            $user = new Users();
            $user->username = $username;
            $user->password = sha1($password);
            $user->name = $name;
            $user->email = $email;
            $user->created_at = new Phalcon\Db\RawValue('now()');
            $user->active = 'Y';
            
            $user->type = $type;
            $user->business_type = $business_type;
            $user->number_of_invoices = $number_of_invoices;
                        
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->tag->setDefault('email', '');
                $this->tag->setDefault('password', '');
                $this->flash->success('Thanks for sign-up, please log-in to start generating invoices');

                return $this->dispatcher->forward(
                    [
                        "controller" => "session",
                        "action"     => "index",
                    ]
                );
            }
        }

        $this->view->form = $form;
    }
}

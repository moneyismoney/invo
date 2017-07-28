<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;

class RegisterForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
        // Name
        $name = new Text('name');
        $name->setLabel('Your Full Name');
        $name->setFilters(array('striptags', 'string'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Name is required'
            ))
        ));
        $this->add($name);

        // Name
        $name = new Text('username');
        $name->setLabel('Username');
        $name->setFilters(array('alpha'));
        $name->addValidators(array(
            new PresenceOf(array(
                'message' => 'Please enter your desired user name'
            ))
        ));
        $this->add($name);
        
         ////Type
//        $type = new Text('type');
//        $type->setLabel('Type');
//        $type->setFilters(array('alpha'));
//        $type->addValidators(array(
//            new PresenceOf(array(
//                'message' => 'Please choose users type'
//            ))
//        ));
//        $this->add($type);
        
        $type = new Select('type', BusinessTypes::find(), array(
            'using'      => array('id', 'type'),
            'useEmpty'   => FALSE,
            'emptyText'  => '...',
            'emptyValue' => ''
        ));
        $type->setLabel('Type');
        $this->add($type);
        
        
        // Business type
        $business_type = new Text('business_type');
        $business_type->setLabel('Business type');
        $business_type->setFilters(array('alpha'));
//        $business_type->addValidators(array(
//            new PresenceOf(array(
//                'message' => 'Please choose users business business_type'
//            ))
//        ));
        $this->add($business_type);
        
        // Number of invoices
        $number_of_invoices = new Text('number_of_invoices');
        $number_of_invoices->setLabel('Number of invoices');
        //$number_of_invoices->setFilters(array('alpha'));
//        $number_of_invoices->addValidators(array(
//            new PresenceOf(array(
//                'message' => 'Please enter number of invoices (1-50)'
//            ))
//        ));
        $this->add($number_of_invoices);

        // Email
        $email = new Text('email');
        $email->setLabel('E-Mail');
        $email->setFilters('email');
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => 'E-mail is required'
            )),
            new Email(array(
                'message' => 'E-mail is not valid'
            ))
        ));
        $this->add($email);

        // Password
        $password = new Password('password');
        $password->setLabel('Password');
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'Password is required'
            ))
        ));
        $this->add($password);

        // Confirm Password
        $repeatPassword = new Password('repeatPassword');
        $repeatPassword->setLabel('Repeat Password');
        $repeatPassword->addValidators(array(
            new PresenceOf(array(
                'message' => 'Confirmation password is required'
            ))
        ));
        $this->add($repeatPassword);
    }
}
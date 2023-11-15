<?php
/**
 * Author: Miles Hegeduis
 * Date: 11/15/2023
 * File Name: user_controller.class.php
 * Description: File defining the UserController class.
 */

require_once 'views/users/register/register.class.php';
require_once 'models/user_model.class.php';

class UserController {// start of UserController class.

    private $userModel;
    // constructor.
    public function __construct() {
        $this->userModel = new UserModel();
    }

    // starting with function to display the registration form to the user.
    public function register() {
        $view = new RegisterView();
        $view->display();
    }// end of register function.

    //function to now add user to database upon registration.
    public function do_register($username, $password, $email, $firstName, $lastName, $phone) {
        $registrationResult = $this->userModel->add_user($username, $password, $email, $firstName, $lastName, $phone);

        if ($registrationResult) {
            // Registration was successful.
            $registrationView = new RegisterConfirm();
            $registrationView->display();
        } else {
            // Registration failed.
            $message = "Registration failed. Please reach out to the administrator or try again.";
            $view = new UserError();
            $view->display($message);
        }
    }// end of register function.

}// end of UserController class.
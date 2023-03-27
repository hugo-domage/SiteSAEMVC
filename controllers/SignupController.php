<?php
require_once 'core/AutoLoad.php';
final class SignupController{

    public function defaultAction() :void{
        View::show("signup/form");
    }

    public function createAction(Array $A_parametres = null, Array $A_postParams = null) : void{
        $A_postParams['password'] = hash('sha512', $A_postParams['password']);
        $loginDB = new Login();
        if($loginDB->create($A_postParams)) {

            Session::start($loginDB->selectByEmail($A_postParams['email']));
            header('Location: /signin');
            exit;
        }
        header('Location: /signup');
    }

}
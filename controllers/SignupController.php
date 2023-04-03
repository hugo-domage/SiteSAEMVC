<?php
require_once 'core/AutoLoad.php';
final class SignupController{

    public function defaultAction() :void{
        View::show("signup/form");
    }

    public function createAction(Array $A_parameters = null, Array $A_postParams = null) : void{
        if (strlen($A_postParams['password']) < 12 || !preg_match("#[0-9]+#", $A_postParams['password']) || !preg_match("#[a-z]+#", $A_postParams['password']) || !preg_match("#[A-Z]+#", $A_postParams['password'])) {
            // Si le mot de passe ne respecte pas les critères, rediriger vers la page d'inscription avec un message d'erreur
            header('Location: /signup');
            exit;
        }

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
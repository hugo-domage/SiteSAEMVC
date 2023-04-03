<?php

use JetBrains\PhpStorm\NoReturn;

final class SigninController{

    public function defaultAction() : void{
        View::show("signin/form");
    }

    public function connectAction(Array $A_parameters = null, Array $A_postParams = null): void{
        $A_status = Login::isUser($A_postParams);
        if($A_status != null){
            switch ($A_status['usertype']){
                case 'User':
                    Session::start($A_status);
                    header('Location: /download');
                    break;
                case 'Admin':
                    Session::start($A_status);
                    header('Location: /allquestionreponse');
                    break;
            }
            exit;
        }
        $this->defaultAction();
    }
}
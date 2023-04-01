<?php
final class UpdatequestionreponseController{
    public function displayAction(Array $A_parameters = null, Array $A_postParams = null) : void{
        if(Session::getSession()['usertype'] != 'Admin') {
            header("Location: /signin");
            exit;
        }
        View::show("updatequestionreponse/update", Questionreponse::selectById($A_parameters[0]));
    }

    public function updateAction(Array $A_parameters = null, Array $A_postParams = null):void{
        Questionreponse::updateQuestionreponse($A_postParams);
        header('Location : /allquestionreponse');
    }
}
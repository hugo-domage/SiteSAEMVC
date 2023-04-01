<?php

final class AddquestionreponseController{

    public function defaultAction() : void{
        if(Session::getSession()['usertype'] != 'Admin') {
            header("Location: /signin");
            exit;
        }
        View::show("addquestionreponse/add");
    }

    public function addAction(Array $A_parameters = null, Array $A_postParams = null):void{
        View::show("/addquestionreponse/add", array('message' => Questionreponse::addQuestionreponse($A_postParams)));
    }
}
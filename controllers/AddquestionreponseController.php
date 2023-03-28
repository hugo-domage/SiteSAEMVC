<?php

final class AddquestionreponseController{

    public function defaultAction() : void{
        View::show("addquestionreponse/add");
    }

    public function addAction(Array $A_parametres = null, Array $A_postParams = null):void{
        View::show("/addquestionreponse/add", array('message' => Questionreponse::addQuestionreponse($A_postParams)));
    }
}
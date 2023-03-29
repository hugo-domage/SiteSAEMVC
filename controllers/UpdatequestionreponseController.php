<?php
final class UpdatequestionreponseController{
    public function displayAction(Array $A_parameters = null, Array $A_postParams = null) : void{
        View::show("updatequestionreponse/update", Questionreponse::selectById($A_parameters[0]));
    }

    public function updateAction(Array $A_parameters = null, Array $A_postParams = null):void{
        Questionreponse::updateQuestionreponse($A_postParams);
        View::show("updatequestionreponse/update");
    }
}
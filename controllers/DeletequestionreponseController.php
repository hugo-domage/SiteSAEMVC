<?php

final class DeletequestionreponseController{

    public function deleteAction(Array $A_parameters = null): void{
            $S_id = $A_parameters[0];
            Questionreponse::deleteByID($S_id);
            header('Location : /allquestionreponse');
            exit;
        }
}
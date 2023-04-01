<?php

final class AllquestionreponseController{

    public function defaultAction() : void{
        if(Session::getSession()['usertype'] != 'Admin') {
            header("Location: /signin");
            exit;
        }
        View::show("allquestionreponse/all",Questionreponse::selectAll());
    }

}
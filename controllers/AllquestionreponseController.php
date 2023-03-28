<?php

final class AllquestionreponseController{

    public function defaultAction() : void{
        View::show("allquestionreponse/all",Questionreponse::selectAll());
    }

}
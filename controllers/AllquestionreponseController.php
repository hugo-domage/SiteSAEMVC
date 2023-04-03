<?php

/**
 * La classe AllquestionreponseController gère l'affichage de toutes les questions-réponses.
 */
final class AllquestionreponseController{

    /**
     * Méthode pour l'action par défaut.
     *
     * Cette méthode vérifie si l'utilisateur est connecté en tant qu'administrateur.
     * Si l'utilisateur n'est pas un administrateur, il est redirigé vers la page de connexion.
     * Sinon, la vue pour afficher toutes les questions-réponses est affichée en utilisant la méthode selectAll de la classe Questionreponse.
     *
     * @return void
     */
    public function defaultAction() : void{
        if(Session::getSession()['usertype'] != 'Admin') {
            header("Location: /signin");
            exit;
        }
        View::show("allquestionreponse/all",Questionreponse::selectAll());
    }
}

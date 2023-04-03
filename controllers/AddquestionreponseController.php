<?php

/**
 * La classe AddquestionreponseController gère l'ajout de questions-réponses.
 */
final class AddquestionreponseController{

    /**
     * Méthode pour l'action par défaut.
     *
     * Cette méthode vérifie si l'utilisateur est connecté en tant qu'administrateur.
     * Si l'utilisateur n'est pas un administrateur, il est redirigé vers la page de connexion.
     * Sinon, la vue pour ajouter une question-réponse est affichée.
     *
     * @return void
     */
    public function defaultAction() : void{
        if(Session::getSession()['usertype'] != 'Admin') {
            header("Location: /signin");
            exit;
        }
        View::show("addquestionreponse/add");
    }

    /**
     * Méthode pour ajouter une question-réponse.
     *
     * Cette méthode prend en paramètres un tableau $A_parameters (non utilisé ici) et un tableau $A_postParams contenant les données postées.
     * Elle utilise la méthode addQuestionreponse de la classe Questionreponse pour ajouter la question-réponse.
     * Elle affiche ensuite la vue pour ajouter une question-réponse en incluant un message de confirmation.
     *
     * @param Array|null $A_parameters Tableau des paramètres de la requête HTTP (non utilisé ici)
     * @param Array|null $A_postParams Tableau des données postées
     *
     * @return void
     */
    public function addAction(Array $A_parameters = null, Array $A_postParams = null): void
    {
        View::show("/addquestionreponse/add", array('message' => Questionreponse::addQuestionreponse($A_postParams)));
    }
}

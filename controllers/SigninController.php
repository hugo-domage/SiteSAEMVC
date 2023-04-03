<?php

/**
 * La classe SigninController gère l'authentification des utilisateurs.
 */
final class SigninController{

    /**
     * Méthode pour l'action par défaut.
     *
     * Cette méthode affiche la vue du formulaire de connexion.
     *
     * @return void
     */
    public function defaultAction() : void{
        View::show("signin/form");
    }

    /**
     * Méthode pour connecter un utilisateur.
     *
     * Cette méthode prend en paramètre un tableau $A_parameters contenant les paramètres d'URL et un tableau $A_postParams contenant les données envoyées par le formulaire de connexion.
     * Elle utilise la méthode isUser de la classe Login pour vérifier si les informations d'authentification sont valides.
     * Si l'authentification réussit, elle utilise la classe Session pour démarrer une session et rediriger l'utilisateur vers la page appropriée en fonction de son type (User ou Admin).
     * Si l'authentification échoue, elle affiche de nouveau la vue du formulaire de connexion.
     *
     * @param Array|null $A_parameters Tableau contenant les paramètres d'URL
     * @param Array|null $A_postParams Tableau contenant les données envoyées par le formulaire de connexion
     *
     * @return void
     */
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

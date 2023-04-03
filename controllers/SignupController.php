<?php
require_once 'core/AutoLoad.php';
/**
 * La classe SignupController est responsable de la gestion des inscriptions des utilisateurs.
 *
 */
final class SignupController{

    /**
     * Affiche le formulaire d'inscription.
     *
     * @return void
     */
    public function defaultAction() :void{
        View::show("signup/form");
    }

    /**
     * Traite la création d'un compte utilisateur avec les données postées.
     * Si le mot de passe ne respecte pas les critères de sécurité (longueur de 12 caractères, présence d'au moins un chiffre, une lettre minuscule et une lettre majuscule), l'utilisateur est redirigé vers la page d'inscription.
     * Si la création du compte est réussie, l'utilisateur est automatiquement connecté et redirigé vers la page de connexion.
     * Si la création du compte échoue, l'utilisateur est redirigé vers la page d'inscription.
     *
     * @param Array|null $A_parameters  Les paramètres de l'URL
     * @param Array|null $A_postParams  Les données POST envoyées par l'utilisateur
     * @return void
     */
    public function createAction(Array $A_parameters = null, Array $A_postParams = null) : void{
        if (strlen($A_postParams['password']) < 12 || !preg_match("#[0-9]+#", $A_postParams['password']) || !preg_match("#[a-z]+#", $A_postParams['password']) || !preg_match("#[A-Z]+#", $A_postParams['password'])) {
            // Si le mot de passe ne respecte pas les critères, rediriger vers la page d'inscription avec un message d'erreur
            header('Location: /signup');
            exit;
        }

        $A_postParams['password'] = hash('sha512', $A_postParams['password']);
        $loginDB = new Login();
        if($loginDB->create($A_postParams)) {

            Session::start($loginDB->selectByEmail($A_postParams['email']));
            header('Location: /signin');
            exit;
        }
        header('Location: /signup');
    }
}

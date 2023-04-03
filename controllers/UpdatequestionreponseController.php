<?php
/**
 * La classe UpdatequestionreponseController gère la mise à jour des questions et réponses.
 */
final class UpdatequestionreponseController{

    /**
     * Affiche le formulaire de mise à jour de la question ou réponse sélectionnée.
     *
     * @param Array|null $A_parameters      Les paramètres de l'URL
     * @param Array|null $A_postParams      Les données POST envoyées par l'utilisateur
     * @return void
     */
    public function displayAction(Array $A_parameters = null, Array $A_postParams = null) : void{
        if(Session::getSession()['usertype'] != 'Admin') {
            header("Location: /signin");
            exit;
        }
        View::show("updatequestionreponse/update", Questionreponse::selectById($A_parameters[0]));
    }

    /**
     * Met à jour la question ou réponse avec les données POST envoyées par l'utilisateur.
     * Redirige l'utilisateur vers la liste de toutes les questions et réponses une fois la mise à jour effectuée.
     *
     * @param Array|null $A_parameters      Les paramètres de l'URL
     * @param Array|null $A_postParams      Les données POST envoyées par l'utilisateur
     * @return void
     */
    public function updateAction(Array $A_parameters = null, Array $A_postParams = null):void{
        Questionreponse::updateQuestionreponse($A_postParams);
        header('Location: /allquestionreponse');
    }
}

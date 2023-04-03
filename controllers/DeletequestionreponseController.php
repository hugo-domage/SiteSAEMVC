<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * La classe DeletequestionreponseController gère la suppression d'une question-réponse.
 */
final class DeletequestionreponseController{

    /**
     * Méthode pour supprimer une question-réponse.
     *
     * Cette méthode prend en paramètre un tableau $A_parameters contenant l'identifiant de la question-réponse à supprimer.
     * Elle utilise la méthode deleteByID de la classe Questionreponse pour supprimer la question-réponse correspondante.
     * Ensuite, elle redirige l'utilisateur vers la liste de toutes les questions-réponses.
     *
     * @param Array|null $A_parameters Tableau contenant l'identifiant de la question-réponse à supprimer
     *
     * @return void
     */
    #[NoReturn] public function deleteAction(Array $A_parameters = null): void
    {
        $S_id = $A_parameters[0];
        Questionreponse::deleteByID($S_id);
        header('Location: /allquestionreponse');
        exit;
    }
}

<?php

/**
 * La classe DownloadController gère l'affichage de la page de téléchargement du jeu.
 */
final class DownloadController{

    /**
     * Méthode pour l'action par défaut.
     *
     * Cette méthode affiche la vue de la page de téléchargement du jeu.
     *
     * @return void
     */
    public function defaultAction() : void{
        View::show("game/download");
    }
}

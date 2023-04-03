<?php

/**
 * Contrôleur gérant les conditions d'utilisation
 */
final class TermsofusesController{

    /**
     * Affiche la page des conditions d'utilisation
     *
     * @return void
     */
    public function defaultAction() : void{
        View::show("/signup/termsofuses");
    }
}

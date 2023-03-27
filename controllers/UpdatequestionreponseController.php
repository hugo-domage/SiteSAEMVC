<?php
final class UpdatequestionreponseController{


    public function showAction(Array $A_parametres = null, Array $A_postParams = null) : void
{
    if (!Session::check()) {
        header('Location: /signin');
        exit;
    }

    $S_id = $A_parametres[0];
    if (!questionreponse::selectById($S_id)) {
        header('Location: /errors/error404');
    }
}
/*
    public function updateAction(Array $A_parametres = null, Array $A_postParams = null) : void{
        $A_postParams['picture'] = questionreponse::updateRecipePicture($A_postParams);
        questionreponse::updateRecipe($A_postParams);
        header('Location: /recipe/show/' . $A_postParams['id']);
    }*/

}
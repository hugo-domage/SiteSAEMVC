<?php
// Ce fichier est le point d'entrée de votre application

require 'core/AutoLoad.php';


$S_urlToPeer = isset($_GET['url']) ? $_GET['url'] : null;
$A_postParams = isset($_POST) ? $_POST : null;

View::openBuffer(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

session_start();

try
{
    $O_controller = new Controller($S_urlToPeer, $A_postParams);
    $O_controller->execute();
}
catch (ControllerException $O_exception)
{
    $O_exception->getMessage();
}


// Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
$contentForDisplay = View::getBufferContent();

// On affiche le contenu dans la partie body du gabarit général
View::show('gabarit', array('body' => $contentForDisplay));
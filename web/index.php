<?php
// --- web/index.$php ---

// --- autoloader de composer ---
require_once __DIR__ . '/../vendor/autoload.php';

DEFINE('PATH_FILE_ZF_VALIDATE', '../language/fr_FR/Zend_Validate.php');

// --- initialisation de la methode pour le controleur defini ci-dessus
$method = 'index';
if ( isset($_POST['method']) ) {
    $method = $_POST['method'];
}

// --- on recupere le nom de la page demandee passee en parametre get
$page = 'accueil'; // si get n'est pas defini
if ( isset($_GET['p']) ) {
    $page = $_GET['p'];
}

$routes = ['accueil' => 'Accueil',
            'journal' => 'Journal'];


if (array_key_exists($page, $routes)) {

    // --- initialisation twig ---
    $fileRoot = '../';
    $twigRoot = 'site/';
    require 'inittwig.php';
// --- initialisation des acces a la base de donnees
    require 'initbdd.php';

    // --- appel du controleur concerne
    $ctrlName = 'wcs\\controller\\site\\' . ucfirst($routes[$page]) . 'Controller';
    $controller = new $ctrlName($twig, $bdd);
    echo $controller->$method();

} else {

    // --- il faudra mettre ici une erreur 404 - not found !!! ---
    echo '<br /><br /><br /><h1>La page demandée n\'existe pas.</h1>';

}


?>

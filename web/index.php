<?php
// --- web/index.$php ---

// --- autoloader de composer ---
require_once __DIR__ . '/../vendor/autoload.php';


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
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/view/');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__ . '/../../tmp',
        'debug' => true,
    ]);
    $twig->addExtension(new Twig_Extension_Debug());

    // --- initialisation des acces a la base de donnees

    require '../src/model/connect.php';
    $bdd = new \PDO(DSN, USER, PASS);
    $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $bdd->exec("set names utf8");

    // --- appel du controleur concerne
    $ctrlName = 'wcs\\controller\\site\\' . ucfirst($routes[$page]) . 'Controller';
    $controller = new $ctrlName($twig, $bdd);
    echo $controller->$method();

} else {

    // --- il faudra mettre ici une erreur 404 - not found !!! ---
    echo '<br /><br /><br /><h1>La page demandée n\'existe pas.</h1>';

}


?>
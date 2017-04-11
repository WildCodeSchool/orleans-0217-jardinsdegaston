<?php
// --- web/index.$php ---

// --- autoloader de composer ---
require_once __DIR__ . '/../vendor/autoload.php';


// --- initialisation de la methode pour le controleur defini ci-dessus
$method = 'index'; // methode par defaut
if ( isset($_POST['method']) ) {
    $method = $_POST['method']; // methode explicitement definie
}

$page = 'accueil';
$routes = ['accueil' => 'Accueil',
            'journal' => 'Journal'];

if ( array_key_exists($page, $routes) ) {

    // --- initialisation twig ---
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/view/');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__ . '/../tmp',
        'debug' => true,
    ]);
    $twig->addExtension(new Twig_Extension_Debug());

    // --- initialisation des acces a la base de donnees
    require '../src/model/connect.php'; // ??? a passer dans environnement ???
    $bdd = new \PDO(DSN, USER, PASS);
    $bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $bdd->exec("set names utf8");

    // --- appel du controleur/methode defini plus haut
    $ctrlName = 'wcs\\controller\\' . $routes[$page] . 'Controller';
    $controller = new $ctrlName($twig, $bdd);
    echo $controller->$method();

}

else {
    $controller = new \wcs\controller\ErrorController($twig, $bdd);
    echo $controller->notFound();
}

?>

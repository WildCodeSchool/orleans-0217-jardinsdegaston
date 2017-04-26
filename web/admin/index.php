<?php
// --- web/admin/index.$php ---

DEFINE('PUBLIC_IMG', dirname(dirname(__FILE__)).'/img/');

// --- on recupere l'eventuel nom de page demandee, passe en parametre get
$page = 'contact'; // page par defaut si get pas defini
if ( isset($_GET['p']) ) {
    $page = $_GET['p'];
}
// --- routes permettant de choisir le controleur qui sera sollicite
// --- key = parametre recupere en get ci-dessus (p=...), value = prefixe du nom du controleur
$routes = [
    'presentation' =>   'Presentation',
    'imgfond' =>        'ImageFond',
    'realisation' =>    'Realisation',
    'prestation' =>     'Prestation',
    'conseil' =>        'Conseil',
    'livredor' =>       'Livredor',
    'contact' =>        'Contact',
    'chezgaston' =>     'JournalAdmin',
    'notfound' =>       'Error',
];
// --- initialisation de la methode pour le controleur defini ci-dessus
$method = 'index'; // methode par defaut
if ( isset($_POST['method']) ) {
    $method = $_POST['method']; // methode explicitement definie
}

//var_dump($_POST);
//die('GLOP');

// --- autoloader de composer ---
require_once __DIR__ . '/../../vendor/autoload.php';

// --- initialisation twig ---
$fileRoot = '../../';
$twigRoot = 'admin/';
require '../inittwig.php';
// --- initialisation des acces a la base de donnees
$connectRoot = '../';
require $connectRoot.'initbdd.php';

// --- si la page demandee existe, on l'affiche
if ( array_key_exists($page, $routes) ) {
    if ($page == 'notfound') {
        $controller = new \wcs\controller\ErrorController($twig, $bdd);
        echo $controller->notFound();
    } else {
        // --- appel du controleur/methode defini plus haut
        $ctrlName = 'wcs\\controller\\admin\\'.$routes[$page].'Controller';
        $controller = new $ctrlName($twig, $bdd);
        echo $controller->$method();
    }

}

?>


<?php
// --- web/admin/index.$php ---


// --- on recupere l'eventuel nom de page demandee, passe en parametre get
$page = 'imgfond'; // page par defaut si get pas defini
if ( isset($_GET['p']) ) {
    $page = $_GET['p'];
}
// --- routes permettant de choisir le controleur qui sera sollicite
// --- key = parametre recupere en get ci-dessus (p=...), value = prefixe du nom du controleur
$routes = [
    'imgfond' => 'BgImage',
    'realisation' => 'Realisation',
    'prestation' => 'Prestation',
    'conseil' => 'Conseil',
    'livredor' => 'Livredor',
    'contact' => 'Message',
    'chezgaston' => 'JournalAdmin',
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
$loader = new Twig_Loader_Filesystem(__DIR__.'/../../src/view/admin/');
$twig = new Twig_Environment($loader, [
    'cache' => false, // dev uniquement, sinon : 'cache' => Environnement::TMPDIR,
    'debug' => true, // pour le dev uniquement (a virer pour la prod)
]);
$twig->addExtension(new Twig_Extension_Debug());

// --- initialisation des acces a la base de donnees
require '../../config/connect.php'; // ??? a passer dans environnement ???
$bdd = new \PDO(DSN, USER, PASS);
$bdd->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
$bdd->exec("set names utf8");

// --- si la page demandee existe, on l'affiche
if ( array_key_exists($page, $routes) ) {

    // --- appel du controleur/methode defini plus haut
    $ctrlName = 'wcs\\controller\\admin\\'.$routes[$page].'Controller';
    $controller = new $ctrlName($twig, $bdd);
    echo $controller->$method();
}
else {
    $controller = new \wcs\controller\ErrorController($twig, $bdd);
    echo $controller->notFound();
}

?>


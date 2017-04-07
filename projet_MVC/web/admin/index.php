<?php
// --- web/admin/index.$php ---

// --- recup des parametres POST d'entree
$method = 'index';
$post = [];
if (isset($_POST)) {
    foreach ( $_POST as $key => $value ) {
        $post[$key] = $value;
    }
    if ( isset($_POST['method']) ) {
        $method = $_POST['method'];
    }
}

$routes = [
    'imgfond' => 'BgImage',
    'realisation' => 'Realisation',
    'prestation' => 'Prestation',
    'conseil' => 'Conseil',
    'livredor' => 'LivredOr',
    'contact' => 'Contact',
    'chezgaston' => 'ChezGaston',

];

// --- autoloader de composer ---
require_once __DIR__ . '/../../vendor/autoload.php';

// --- on recupere l'eventuel nom de page demandee passee en parametre get
$page = 'imgfond'; // si get pas defini
if ( isset($_GET['p']) ) {
    $page = $_GET['p'];
}


// --- si la page demandee existe, on l'affiche
if ( array_key_exists($page, $routes) ) {

    // --- initialisation twig ---
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../src/view/admin/');
    $twig = new Twig_Environment($loader, [
        'cache' => false, //__DIR__ . '/../../tmp',
        'debug' => true,
    ]);
    $twig->addExtension(new Twig_Extension_Debug());

    // --- appel du controleur concerne
    $ctrlName = 'wcs\\controller\\admin\\'.$routes[$page].'Controller';
    $controller = new $ctrlName($twig, $post);
    echo $controller->$method();
}
else {
    // --- il faudra mettre ici une erreur 404 - not found !!! ---
    echo '<br /><br /><br /><h1>La page demandée n\'existe pas.</h1>';

}

?>


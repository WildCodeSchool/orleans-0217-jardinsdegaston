<?php
// --- web/inittwig.php ---

// --- initialisation twig ---
$loader = new Twig_Loader_Filesystem($fileRoot.'src/view/'.$twigRoot);
$twig = new Twig_Environment($loader, [
    'cache' => false, // dev uniquement, sinon : 'cache' => Environnement::TMPDIR,
    'debug' => true, // pour le dev uniquement (a virer pour la prod)
]);
$twig->addExtension(new Twig_Extensions_Extension_Intl());
$twig->addExtension(new Twig_Extension_Debug());


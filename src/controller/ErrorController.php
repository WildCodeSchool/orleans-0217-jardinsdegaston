<?php
/* --- src/controller/ErrorController.php --- */


namespace wcs\controller;

class ErrorController extends Controller
{
    public function notFound()
    {
        $params = [
            'titre' => 'Page introuvable',
            'erreur' => 'La page recherchée n\'existe pas (ou plus).',
        ];
        return $this->twig->render('Erreur.twig', $params);
    }
}
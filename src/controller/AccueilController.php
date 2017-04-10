<?php
// --- src/controller/Controller.php ---

namespace wcs\controller;
use wcs\model\Presentation;
use wcs\model\PresentationManager;

/*
 * class pour l'accueil
 */
class  AccueilController extends Controller
{
    public function index()
    {
        $presentationManager = new PresentationManager($this->bdd, Presentation::class);
        $presentation = $presentationManager->findOne(1);
        return $this->twig->render('Accueil.twig',array('presentation'=>$presentation));

    }
}
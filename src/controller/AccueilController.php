<?php
// --- src/controller/Controller.php ---

namespace wcs\controller;

use wcs\model\Conseil;
use wcs\model\ConseilManager;
use wcs\model\Livredor;
use wcs\model\LivredorManager;
use wcs\model\Presentation;
use wcs\model\PresentationManager;
use wcs\model\Prestation;
use wcs\model\PrestationManager;

/*
 * class pour l'accueil
 */
class AccueilController extends Controller
{
    /**
     * Methode pour instancier le titre et le contenu de la presentation
     * et le renvoyer vers twig
     **/
    public function index()
    {
        $presentationH1Manager = new PresentationManager($this->bdd, Presentation::class);
        $presentationH1 = $presentationH1Manager->findOne(1);

        $presentationH3Manager = new PresentationManager($this->bdd, Presentation::class);
        $presentationH3 = $presentationH1Manager->findAll('WHERE id >= 2');

        $prestationManager = new PrestationManager($this->bdd, Prestation::class);
        $prestation = $prestationManager->findAll();

        $conseilManager = new ConseilManager($this->bdd, Conseil::class);
        $conseil = $conseilManager->findOne(1);

        $livredorManager = new LivredorManager($this->bdd, Livredor::class);
        $livredor = $livredorManager->findAll();

        return $this->twig->render('Accueil.twig', array('presentationH1'=>$presentationH1,
                                                        'presentationH3'=>$presentationH3,
                                                        'prestation'=>$prestation,
                                                        'conseil'=>$conseil,
                                                        'livredor'=>$livredor));

    }

    public function creerMessage()
    {

    }
}
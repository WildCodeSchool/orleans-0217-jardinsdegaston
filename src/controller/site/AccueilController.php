<?php

// --- src/controller/Controller.php ---

namespace wcs\controller\site;

use wcs\controller\Controller;
use wcs\form\ContactForm;
use wcs\model\Conseil;
use wcs\model\ConseilManager;
use wcs\model\Contact;
use wcs\model\ContactManager;
use wcs\model\Livredor;
use wcs\model\LivredorManager;
use wcs\model\Presentation;
use wcs\model\PresentationManager;
use wcs\model\Prestation;
use wcs\model\PrestationManager;
use wcs\model\Realisation;
use wcs\model\RealisationManager;

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
        $presentationH3 = $presentationH3Manager->findAll('WHERE id >= 2');

        $realisationManager = new RealisationManager($this->bdd, Realisation::class);
        $realisation = $realisationManager->findAll('WHERE activation > 0');

        $prestationManager = new PrestationManager($this->bdd, Prestation::class);
        $prestation = $prestationManager->findAll('ORDER by ordreaff');

        $conseilManager = new ConseilManager($this->bdd, Conseil::class);
        $conseil = $conseilManager->findOne(1);

        $livredorManager = new LivredorManager($this->bdd, Livredor::class);
        $livredor = $livredorManager->findAll();

        $contact = new ContactForm();




        return $this->twig->render('site/Accueil.twig', array('presentationH1'=>$presentationH1,
                                                        'presentationH3'=>$presentationH3,
                                                        'prestation'=>$prestation,
                                                        'realisation'=>$realisation,
                                                        'conseil'=>$conseil,
                                                        'livredor'=>$livredor,
                                                        'contact'=>$contact));

    }


}
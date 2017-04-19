<?php

// --- src/controller/Controller.php ---

namespace wcs\controller\site;

use wcs\controller\Controller;
use wcs\model\Conseil;
use wcs\model\ConseilManager;
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
        $saison=$this->whatSeason();
        $presentationH1Manager = new PresentationManager($this->bdd, Presentation::class);
        $presentationH1 = $presentationH1Manager->findOne(1);

        $presentationH3Manager = new PresentationManager($this->bdd, Presentation::class);
        $presentationH3 = $presentationH3Manager->findAll('WHERE id >= 2');

        $realisationManager = new RealisationManager($this->bdd, Realisation::class);
        $realisation = $realisationManager->findAll('WHERE activation > 0');

        $prestationManager = new PrestationManager($this->bdd, Prestation::class);
        $prestation = $prestationManager->findAll('ORDER by ordreaff');

        $conseilManager = new ConseilManager($this->bdd, Conseil::class);
        $conseilSaison = $conseilManager->findAll("WHERE  $saison  > 0");
//        var_dump($conseilSaison);
        $conseilRand = mt_rand(0,count($conseilSaison)-1);
//        var_dump($conseilRand);
        $conseil = $conseilSaison[$conseilRand];
//        var_dump($conseil);


        $livredorManager = new LivredorManager($this->bdd, Livredor::class);
        $livredor = $livredorManager->findAll();

        return $this->twig->render('site/Accueil.twig', array('presentationH1'=>$presentationH1,
                                                        'presentationH3'=>$presentationH3,
                                                        'prestation'=>$prestation,
                                                        'realisation'=>$realisation,
                                                        'conseil'=>$conseil,
                                                        'livredor'=>$livredor));

    }

    public function envoiContact()
    {

    }

    public function whatSeason()
    {
        $today = new \DateTime();
        $spring = new \DateTime('March 20');
        $summer = new \DateTime('June 20');
        $fall = new \DateTime('September 22');
        $winter = new \DateTime('December 21');
        $saison='';

        switch(true) {
            case $today >= $spring && $today < $summer:
                $saison='printemps';
                break;
            case $today >= $summer && $today < $fall:
                $saison='ete';
                break;

            case $today >= $fall && $today < $winter:
                $saison='automne';
                break;

            case $today >= $winter && $today < $spring:
                $saison='hiver';
                break;

        }
        return $saison;

    }


}
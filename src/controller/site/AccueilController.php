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
use wcs\model\Parametre;
use wcs\model\ParametreManager;

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
        $conseilRand = mt_rand(0,count($conseilSaison)-1);
        $conseil = $conseilSaison[$conseilRand];
        $livredorManager = new LivredorManager($this->bdd, Livredor::class);
        $livredor = $livredorManager->findAll();
        $parametreManager = new ParametreManager($this->bdd, Parametre::class);
        $parametresGeneraux = $parametreManager->read();
        $params = [
            'presentationH1' => $presentationH1,                    // presentation generale
            'presentationH3' => $presentationH3,                    // valeurs 1 et valeurs 2
            'prestation' => $prestation,                            // liste des prestations
            'realisation' => $realisation,                          // liste des realisations (avant/apres)
            'conseil' => $conseil,                                  // le conseil du moment
            'livredor' => $livredor,                                // livre d'or
            'bgcss' => 'bg'.strtoupper($saison[0]).'.css',          // css pour image d'accueil (fonction de la saison)
            'chezgaston' => $parametresGeneraux->getChezGaston(),   // affichage (=1) ou non (=0) du journal de Gaston
        ];

        return $this->twig->render('site/Accueil.twig', $params);

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
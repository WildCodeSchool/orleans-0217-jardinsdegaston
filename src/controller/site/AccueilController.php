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
use wcs\model\Parametre;
use wcs\model\ParametreManager;
use wcs\form\ContactFilter;
use wcs\Service\Translator;
use wcs\Service\TranslatorInterface;

/*
 * class pour l'accueil
 */

class AccueilController extends Controller
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    public function __construct($twig, \PDO $bdd)
    {
        parent::__construct($twig, $bdd);
        $translator = new Translator();
        $this->translator = $translator;
    }

    public function index()
    {
        $saison = $this->whatSeason();
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

        $conseilRand = mt_rand(0, count($conseilSaison) - 1);

        $conseil = $conseilSaison[$conseilRand];

        $livredorManager = new LivredorManager($this->bdd, Livredor::class);
        $livredor = $livredorManager->findAll();

        $parametreManager = new ParametreManager($this->bdd, Parametre::class);
        $parametresGeneraux = $parametreManager->read();


        $contactForm = new ContactForm();

        $ok = '';
        if (isset($_GET['message']))
        {
            $ok='Message envoyé';
        }
        if (isset($_POST['add'])) {
            $filter = new ContactFilter();
            $contactForm->setInputFilter($filter);
            $contactForm->setData($_POST);

            $nomErr = [];
            $prenomErr = [];
            $emailErr = [];
            $telErr = [];
            $contenuErr = [];


            if ($contactForm->isValid()) {
                $contactManager = new ContactManager($this->bdd, Contact::class);
                if ($contactManager->addContact()) {
                   // $ok = 'message envoyé';
                    header('Location:index.php?message=1');
                };
            } else {
                $nomErr = $contactForm->get('NomContact')->getMessages();
                $this->translator->translate($nomErr);
                $prenomErr = $contactForm->get('PrenomContact')->getMessages();
                $this->translator->translate($prenomErr);
                $emailErr = $contactForm->get('EmailContact')->getMessages();
                $this->translator->translate($emailErr);
                $telErr = $contactForm->get('TelContact')->getMessages();
                $this->translator->translate($telErr);
                $contenuErr = $contactForm->get('TexteContact')->getMessages();
                $this->translator->translate($contenuErr);
            }
            return $this->twig->render('site/Accueil.twig', array('nomErr' => $nomErr,
                                                                    'prenomErr' => $prenomErr,
                                                                    'emailErr' => $emailErr,
                                                                    'telErr' => $telErr,
                                                                    'contenuErr' => $contenuErr,
                                                                    'presentationH1' => $presentationH1,
                                                                    'presentationH3' => $presentationH3,
                                                                    'prestation' => $prestation,
                                                                    'realisation' => $realisation,
                                                                    'conseil' => $conseil,
                                                                    'livredor' => $livredor,
                                                                    'contact' => $contactForm,
                                                                    'ok' => $ok,
                                                                    'bgcss' => 'bg' . strtoupper($saison[0]) . '.css',
                                                                    'chezgaston' => $parametresGeneraux->getChezGaston()));

        }

        return $this->twig->render('site/Accueil.twig', array('presentationH1' => $presentationH1,
            'presentationH3' => $presentationH3,
            'prestation' => $prestation,
            'realisation' => $realisation,
            'conseil' => $conseil,
            'livredor' => $livredor,
            'contact' => $contactForm,
            'bgcss' => 'bg' . strtoupper($saison[0]) . '.css',
            'ok'=>$ok,
            'chezgaston' => $parametresGeneraux->getChezGaston()));

    }

        public function whatSeason()
        {
            $today = new \DateTime();
            $spring = new \DateTime('March 20');
            $summer = new \DateTime('June 20');
            $fall = new \DateTime('September 22');
            $winter = new \DateTime('December 21');
            $saison = '';

            switch (true) {
                case $today >= $spring && $today < $summer:
                    $saison = 'printemps';
                    break;
                case $today >= $summer && $today < $fall:
                    $saison = 'ete';
                    break;

                case $today >= $fall && $today < $winter:
                    $saison = 'automne';
                    break;

                case $today >= $winter && $today < $spring:
                    $saison = 'hiver';
                    break;

            }
            return $saison;

        }
}


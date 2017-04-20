<?php
// --- src/controller/admin/PrestationController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use \wcs\model\Prestation;
use \wcs\model\PrestationManager;

/**
 * Class PrestationController
 * page d'admin des prestations (visu, ajout, modif supp)
 * @package wcs\controller\admin
 */
class PrestationController extends Controller
{

    /**
     * **********************************************************
     * premier acces a la page
     * @return mixed
     */
    public function index()
    {
        $this->img->resetTmp('P');
        $manager = new PrestationManager($this->bdd, Prestation::class);
        $tmpinfos = ['id' => 0, 'titre' => '', 'contenu' => '', 'tmpimage' => $this->img->getTmpName('P')];
        $params = [
            'prestations' => $manager->findAll('ORDER BY ordreaff'),
            'tmpinfos' => $tmpinfos,
        ];
        return $this->twig->render('prestation/Prestation.twig', $params);
    }

    /**
     * **********************************************************
     * Affiche la page ajout
     * @return mixed
     */
    public function ajout()
    {
        $prestation = new Prestation;
        $prestation->hydrate(0, '', '', 0);
        $erreur = '';
        $params = [
            'prestation' => $prestation,
            'tmpimage' => $this->img->getTmpName('P'),
            'erreur' => $erreur,
        ];
        return $this->twig->render('prestation/AjoutePrestation.twig', $params);
    }

    /**
     * **********************************************************
     * Affiche la page modification
     * @return mixed
     */
    public function modif()
    {
        if (isset($_POST['id']) ) {
            $id = $_POST['id'];
            $manager = new PrestationManager($this->bdd, Prestation::class);
            $erreur = '';
            $params = [
                'prestation' => $manager->findOne($id),
                'tmpimage' => $this->img->getTmpName('P'),
                'erreur' => $erreur,
            ];
            if ( isset($_POST['supprime']) ) {
                return $this->twig->render('prestation/SupprimePrestation.twig', $params);
            }
            else {
                return $this->twig->render('prestation/ModifiePrestation.twig', $params);
            }
        }
        else {

            // --- ERREUR l'id n'est pas défini ---
        }
    }

    /**
     * **********************************************************
     * ajout ou modification : upload nouvelle image
     * @return mixed
     */
    public function imgupload()
    {
        $erreur = '';
        if ( false === $this->img->recupImg('P') )
        {
            $erreur = $this->img->getErreur();
            $this->img->resetTmp('P');
        }
        // --- recuperation des infos $_POST
        $id = $_POST['id'];
        $prestation = new Prestation;
        $prestation->hydrate($id, $_POST['titre'], $_POST['contenu'], $_POST['ordreaff']);
        $params = [
            'prestation' => $prestation,
            'tmpimage' => $this->img->getTmpName('P'),
            'erreur' => $erreur,
        ];
        if ( $id == 0 ) {
            return $this->twig->render('prestation/AjoutePrestation.twig', $params);
        }
        else {
            return $this->twig->render('prestation/ModifiePrestation.twig', $params);
        }
    }

    /**
     * **********************************************************
     * Traitement de la modification d'une prestation
     * @return mixed
     */
    public function majpresta()
    {
        if ( isset($_POST['abandon']) ) {
            header('location:index.php?p=prestation');
        }
        $erreur = '';
        $prestation = new Prestation;
        $prestation->hydrate(intval($_POST['id']), $_POST['titre'], $_POST['contenu'], intval($_POST['ordreaff']));
        $ok = true;
        if ( !isset($_POST['titre'])) {
            // --- controler si titre saisi
            $erreur = 'La saisie d\'un titre est obligatoire.';
            $ok = false;
        }
        if ( $ok ) {
            if ($this->img->tmpImgExists('P')) {
                // --- deplacer image temporaire vers emplacement définitif
                $this->img->deplace('P', $_POST['id']);
            }
            // --- mise a jour de l'enregistrement
            $manager = new PrestationManager($this->bdd, Prestation::class);
            $manager->writePrestation($prestation);

            // --- recharger page index
            header('location:index.php?p=prestation');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'prestation' => $prestation,
                'tmpimage' => $this->img->getTmpName('P'),
                'erreur' => $erreur,
            ];
            return $this->twig->render('prestation/ModifiePrestation.twig', $params);
        }
    }

    /**
     * **********************************************************
     * Valide la saisie pour l'ajout d'une prestation et enregistre
     * @return mixed
     */
    public function addpresta()
    {
        if ( isset($_POST['annule']) ) {
            header('location:index.php?p=prestation');
        }
        $erreur = '';
        $prestation = new Prestation;
        $prestation->hydrate(0, $_POST['titre'], $_POST['contenu'], 0);
        $ok = true;
        if ( !$this->img->tmpImgExists('P') ) {
            // --- controle si image chargee
            $erreur = 'Charger d\'abord une image.';
            $ok = false;
        }
        elseif ( !isset($_POST['titre']) || trim($_POST['titre']) == '') {
            // --- controler si titre saisi
            $erreur = 'La saisie d\'un titre est obligatoire.';
            $ok = false;
        }
        if ( $ok ) {
            $manager = new PrestationManager($this->bdd, Prestation::class);
            // --- definir ordreaff (nombre prestations + 1) et enregistrer
            $prestation->setOrdreAff($manager->countAll() + 1);
            // --- enregistrer la nouvelle presta et recuperer son id
            $id = $manager->writePrestation($prestation);
            // --- deplacer image temporaire vers emplacement définitif
            $this->img->deplace('P', $id);
            // --- recharger page index
            header('location:index.php?p=prestation');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'prestation' => $prestation,
                'tmpimage' => $this->img->getTmpName('P'),
                'erreur' => $erreur,
            ];
            return $this->twig->render('prestation/AjoutePrestation.twig', $params);
        }
    }

    /**
     * **********************************************************
     * Suppression d'une prestation
     */
    public function delpresta()
    {
        if ( isset($_POST['supprime']) ) {
            $manager = new PrestationManager($this->bdd, Prestation::class);
            // --- suppression de la prestation
            $manager->delOne($_POST['id']);
            // --- reorganisation de l'ordre d'affichage
            $manager->delOrdreAff($_POST['ordreaff']);
            // --- suppression de l'image attachee
            $this->img->delImg('P', $_POST['id']);
        }
        header('location:index.php?p=prestation');
    }

    public function updown()
    {
        $manager = new PrestationManager($this->bdd, Prestation::class);
        $id = $_POST['id'];
        $ordreaff = $_POST['ordreaff'];
        if ( isset($_POST['up']) ) {
            $manager->up($id, $ordreaff);
        }
        elseif ( isset($_POST['dn']) ) {
            $manager->dn($id, $ordreaff);
        }
        header('location:index.php?p=prestation');
    }


}
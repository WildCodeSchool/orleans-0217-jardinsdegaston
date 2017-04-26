<?php
// --- src/controller/admin/ImageFondController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;

/**
 * Class BgImageController
 * Controlleur permettant la gestion des images de fond
 * @package wcs\controller\admin
 */
class ImageFondController extends Controller
{

    /**
     * **********************************************************
     * premier acces a la page
     * @return mixed
     */
    public function index()
    {
        $this->img->resetTmp('B');
        $erreur = '';
        $selected = '';
        $params = [
            'saisons' => $this->getSaisons(),               // les libelles des saisons
            'formimage' => $this->img->getTmpName('B'),     // l'image temporaire
            'erreur' => $erreur,                            // l'eventuelle erreur a afficher
            'selected' => $selected,                        // la saison selectionnee
        ];
        return $this->twig->render('imageFond/ImageFond.twig', $params);
    }

    /**
     * **********************************************************
     * methode sollicitee apres upload nouvelle image
     * @return mixed
     */
    public function imgupload()
    {
        $erreur = '';
        if ( false === $this->img->recupImg('B') )
        {
            $erreur = $this->img->getErreur();
            $this->img->resetTmp('B');
        }
        if ( isset($_POST['saison']) ) {
            // --- on recupere la selection de la saison
            $selected = $_POST['saison'];
        } else {
            $selected = '';
        }
        $params = [
            'saisons' => $this->getSaisons(),               // les libelles des saisons
            'formimage' => $this->img->getTmpName('B'),     // l'image temporaire
            'erreur' => $erreur,                            // l'eventuelle erreur a afficher
            'selected' => $selected,                        // la saison selectionnee
        ];
        return $this->twig->render('imageFond/ImageFond.twig', $params);
    }

    /**
     * **********************************************************
     * methode sollicitee apres soumission d'une nouvelle image pour remplacer une image existante
     * @return mixed
     */
    public function imgswitch()
    {
        if ( isset($_POST['annule']) ) {
            // --- on recharge la page initiale (qui reinitialise le formulaire)
            header('location:imgFond');
        }
        if ( isset($_POST['saison']) ) {
            // --- on recupere la saison selectionnee
            $selected = $_POST['saison'];
        } else {
            $selected = '';
        }
        $erreur = '';
        $ok = true;
        if (!$this->img->tmpImgExists('B')) {
            // --- controler si image temporaire dispo
            $erreur = 'Choisir d\'abbord une nouvelle image.';
            $ok = false;
        } elseif ( $selected == '' ) {
            // --- controler si selection saison effectuee
            $erreur = 'Sélectionner d\'abord une saison.';
            $ok = false;
        }
        if ( $ok ) {
            // --- deplacer image temporaire vers emplacement définitif
            if (false === $this->img->deplace('B', $this->getNumSaison($_POST['saison']))) {
                $erreur = $this->img->getErreur();
                $ok = false;
            }
        }
        if ( $ok ) {
            // --- recharger page index

            header('location:imgFond');
        }
        else {

            // --- recharger la page en affichant l'erreur
            $params = [
                'saisons' => $this->getSaisons(),               // les libelles des saisons
                'formimage' => $this->img->getTmpName('B'),     // l'image temporaire
                'erreur' => $erreur,                            // l'eventuelle erreur a afficher
                'selected' => $selected,                        // la saison selectionnee
            ];
            return $this->twig->render('imageFond/ImageFond.twig', $params);
        }
    }
}
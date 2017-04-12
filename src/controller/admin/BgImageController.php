<?php
// --- src/controller/admin/BgImageController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;

/**
 * Class BgImageController
 * Controlleur permettant la gestion des images de fond
 * @package wcs\controller\admin
 */
class BgImageController extends Controller
{

    /**
     * **********************************************************
     * premier acces a la page
     * @return mixed
     */
    public function index()
    {
        $this->img->resetTmp('B');
        $params = [
            'saisons' => $this->getSaisons(),
            // --- recuperation de l'image a afficher dans le formulaire (a priori image vide)
            'formimage' => $this->img->getTmpName('B'),
        ];
        return $this->twig->render('imageFond.twig', $params);
    }

    /**
     * **********************************************************
     * methode sollicitee apres upload nouvelle image
     * @return mixed
     */
    public function imgupload()
    {
        $erreur = '';
        if ( false === $this->img->recupImg('B') ) {
            $erreur = 'Problème de transfert d\'image. Chargement abandonné.';
            $this->img->resetTmp('B');
        }
        $params = [
            'saisons' => $this->getSaisons(),
            'formimage' => $this->img->getTmpName('B'),
            'erreur' => $erreur,
        ];
        return $this->twig->render('imageFond.twig', $params);
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
            header('location:index.php.old?p=imgfond');
        }
        $erreur = '';
        $ok = true;
        if (!$this->img->tmpImgExists('B')) {
            // --- controler si image temporaire dispo
            $erreur = 'Choisir d\'abbord une nouvelle image.';
            $ok = false;
        }
        elseif ( !isset($_POST['saison'])) {
            // --- controler si selection saison effectuee
            $erreur = 'Sélectionner d\'abord une saison.';
            $ok = false;
        }
        if ( $ok ) {
            // --- deplacer image temporaire vers emplacement définitif
            $this->img->deplace('B', $this->getNumSaison($_POST['saison']));
            // --- recharger page index
            header('location:index.php.old?p=imgfond');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'saisons' => $this->getSaisons(),
                'formimage' => $this->img->getTmpName('B'),
                'erreur' => $erreur,
            ];
            return $this->twig->render('imageFond.twig', $params);
        }
    }
}
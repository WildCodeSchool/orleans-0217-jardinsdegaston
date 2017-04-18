<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 01/04/17
 * Time: 21:07
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use wcs\form\RealisationForm;
use wcs\model\Realisation;
use wcs\model\RealisationManager;



class RealisationController extends Controller
{


    public function index()
    {
        $this->img->resetTmp('Rav');
        $this->img->resetTmp('Rap');
        $manager = new RealisationManager($this->bdd, Realisation::class);
        $form = new RealisationForm();
        $tmpinfos = ['id' => 0,
                     'titre' => '',
                     'contenu' => '',
                     'tmpRav' => $this->img->getTmpName('Rav'),
                     'tmpRap' => $this->img->getTmpName('Rap'),];

        $param = ["content" => $manager->getReal(),
            'form' => $form,
            'tmpinfos' => $tmpinfos,
        ];

        return $this->twig->render('realisation/Realisation.twig', $param);
    }

//    public function updateReal()
//    {
//        $manager = new RealisationManager($this->bdd, Realisation::class);
//        $manager->update();
//        return $this->index();
//
//    }

    public function modif()
    {
        if (isset($_POST['id']) ) {
            $id = $_POST['id'];
            $manager = new RealisationManager($this->bdd, Realisation::class);
            $erreur = '';
            $params = [
                'realisation' => $manager->findOne($id),
                'tmpRav' => $this->img->getTmpName('Rav'),
                'tmpRap' => $this->img->getTmpName('Rap'),
                'erreur' => $erreur
            ];

                return $this->twig->render('realisation/ModifieRealisation.twig', $params);

        }

    }

    public function imgupload()
    {

        $erreur = '';
        if (isset($_POST['typeImg']))
        {
            if ( false === $this->img->recupImg($_POST['typeImg']) ) {
                $erreur = 'Problème de transfert d\'image. Chargement abandonné.';
                $this->img->resetTmp($_POST['typeImg']);
            }
        }
//        if ( false === $this->img->recupImg('Rav') ) {
//            $erreur = 'Problème de transfert d\'image. Chargement abandonné.';
//            $this->img->resetTmp('Rav');
//        }
//        if ( false === $this->img->recupImg('Rap') ) {
//            $erreur = 'Problème de transfert d\'image. Chargement abandonné.';
//            $this->img->resetTmp('Rap');
//        }
        // --- recuperation des infos $_POST
        $id = $_POST['id'];
        $realisation = new Realisation();
        $realisation->hydrate($id, $_POST['titre'], $_POST['contenu'], intval($_POST['activation']));
        $params = [
            'realisation' => $realisation,
            'tmpRav' => $this->img->getTmpName('Rav'),
            'tmpRap' => $this->img->getTmpName('Rap'),
            'erreur' => $erreur,
        ];

            return $this->twig->render('realisation/ModifieRealisation.twig', $params);

    }

    public function majReal()
    {
        if ( isset($_POST['abandon']) ) {
            header('location:index.php?p=realisation');
        }
        $erreur = '';
        $realisation = new Realisation();
        $realisation->hydrate($_POST['id'], trim($_POST['titre']), trim($_POST['contenu']), intval($_POST['activation']));
        $ok = true;
        if ( !isset($_POST['titre'])) {
            // --- controler si titre saisi
            $erreur = 'La saisie d\'un titre est obligatoire.';
            $ok = false;
        }
        if ( $ok ) {
            if ($this->img->tmpImgExists('Rav')) {
                // --- deplacer image temporaire vers emplacement définitif
                $this->img->deplace('Rav', $_POST['id']);
            }
            if ($this->img->tmpImgExists('Rap')) {
                // --- deplacer image temporaire vers emplacement définitif
                $this->img->deplace('Rap', $_POST['id']);
            }
            // --- mise a jour de l'enregistrement
            $manager = new RealisationManager($this->bdd, Realisation::class);
            $manager->update($_POST['id']);
            // --- recharger page index
            header('location:index.php?p=realisation');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'realisation' => $realisation,
                'tmpRav' => $this->img->getTmpName('Rav'),
                'tmpRap' => $this->img->getTmpName('Rap'),
                'erreur' => $erreur,
            ];
            return $this->twig->render('realisation/ModifieRealisation.twig', $params);
        }
    }



}
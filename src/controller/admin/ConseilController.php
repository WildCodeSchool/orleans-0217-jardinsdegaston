<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 08:06
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use wcs\model\Conseil;
use wcs\model\ConseilManager;
use wcs\form\ConseilForm;
use wcs\form\ConseilFilter;


class ConseilController extends Controller
{

    public function index()
    {
        $manager = new ConseilManager($this->bdd, Conseil::class);
        $form = new ConseilForm();
        $filter = new ConseilFilter();
        $form->setInputFilter($filter);
        $params = ["conseils" => $manager->findAll('conseil'),
                    'form' => $form];

        return $this->twig->render('conseil/Conseil.twig', $params);
    }

    public function ajoutConseil()
    {
        $form = new ConseilForm();
        $conseilManager = new ConseilManager($this->bdd, Conseil::class);

        if (isset($_POST['ajout'])) {

            $filter = new ConseilFilter();
            $form->setInputFilter($filter);
            $form->setData($_POST);


            $contenuErr = [];

            if ($form->isValid()) {
                $manager = new ConseilManager($this->bdd, Conseil::class);
                $conseil = new Conseil();
                $data = $form->getData();

                $contenu = $data['contenu'];

                    if ($data['printemps'] != null) {
                        $printemps = 1;
                    } else {
                        $printemps = 0;
                    }

                    if ($data['ete']!= null)  {
                        $ete = 1;
                    } else {
                        $ete = 0;
                    }

                    if ($data['automne'] != null) {
                        $automne = 1;
                    } else {
                        $automne = 0;
                    }

                    if ($data['hiver'] != null)  {
                        $hiver = 1;
                    } else {
                        $hiver = 0;
                    }

                $conseil->hydrate(0, $contenu, $printemps, $ete, $automne, $hiver);
                $manager->add($conseil);

            } else {
                $contenuErr = $form->get('contenu')->getMessages();
            }

            $conseils = $conseilManager->findAll('conseil');

            /* definition des paramètres à envoyer à twig */
            $params = [
                'conseils' => $conseils,
                'form' => $form,
                'contenuErr' => $contenuErr,
            ];

            return $this->twig->render('conseil/Conseil.twig', $params);

        }

    }

    public function updateConseil()
    {
        if (isset($_POST['updateConseil'])) {

            if (isset($_POST['printemps']) && $_POST != null) {
                $printemps = 1;
            } else {
                $printemps = 0;
            }

            if (isset($_POST['ete']) && $_POST != null)  {
                $ete = 1;
            } else {
                $ete = 0;
            }

            if (isset($_POST['automne']) && $_POST != null) {
                $automne = 1;
            } else {
                $automne = 0;
            }

            if (isset($_POST['hiver']) && $_POST != null)  {
                $hiver = 1;
            } else {
                $hiver = 0;
            }

            $contenu = $_POST['contenu'];

            $conseil = new Conseil();
            $conseil->hydrate(intval($_POST['id']), $contenu, $printemps, $ete, $automne, $hiver);

            $manager = new ConseilManager($this->bdd, Conseil::class);
            $manager->update($conseil);
        } else {
            header('location:google.fr');
        }
        header('location:index.php?p=conseil');
    }

    public function deleteConseil()
    {
        if (isset($_POST['deleteConseil'])) {
            $manager = new ConseilManager($this->bdd, Conseil::class);
            $manager->delete();
        }
        header('location:index.php?p=conseil');
    }



    // A FINIR SI TEMPS OK
    /*public function affichageConditionnelConseil()
    {
        $manager = new ConseilManager($this->bdd, Conseil::class);

        if (isset($_POST['actualiserAffichage'])) {
            $saison = $_POST['saison'] ;
            $conseils = $manager->findBySeason($saison);
            return $conseils;

        }

        $form = new ConseilForm();
        $filter = new ConseilFilter();
        $form->setInputFilter($filter);
        $params = ["conseils" => $conseils,
                    'form' => $form];

        return $this->twig->render('conseil/Conseil.twig', $params);

    }*/

}

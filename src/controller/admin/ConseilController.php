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
        // --- parametres pour affichage conseils siovant saison(s) selectionnee(s)
        $affSaison = ['P' => 0, 'E' => 0, 'A' => 0, 'H' => 0]; // aucune saison selectionnee par defaut = tout afficher
        $sqlOptions = '';
        if ( isset($_POST['actualiserAffichage'])) {
            // --- on revient ici apres avoir modifie la selection d'affichage des saisons
            // --- relecture des saisons selectionnees
            if ( isset($_POST['selprintemps']) ) $affSaison['P'] = 1;
            if ( isset($_POST['selete']) ) $affSaison['E'] = 1;
            if ( isset($_POST['selautomne']) ) $affSaison['A'] = 1;
            if ( isset($_POST['selhiver']) ) $affSaison['H'] = 1;
            // --- preparation de la requete SQL
            if ( $affSaison['P'] + $affSaison['E'] + $affSaison['A'] + $affSaison['H'] > 0 ) {
                // --- au moins une saison est selectionnee, il faut initialiser $sqlOptions
                $prems = true;
                $sqlOptions = ' WHERE';
                if ( $affSaison['P'] == 1 ) {
                    $sqlOptions .= ' printemps=1';
                    $prems = false;
                }
                if ( $affSaison['E'] == 1 ) {
                    if ( !$prems ) {
                        $sqlOptions .= ' AND';
                    }
                    $sqlOptions .= ' ete=1';
                    $prems = false;
                }
                if ( $affSaison['A'] == 1 ) {
                    if ( !$prems ) {
                        $sqlOptions .= ' AND';
                    }
                    $sqlOptions .= ' automne=1';
                    $prems = false;
                }
                if ( $affSaison['H'] == 1 ) {
                    if ( !$prems ) {
                        $sqlOptions .= ' AND';
                    }
                    $sqlOptions .= ' hiver=1';
                }

            }
        }
        $manager = new ConseilManager($this->bdd, Conseil::class);
        $form = new ConseilForm();
        $filter = new ConseilFilter();
        $form->setInputFilter($filter);
        $params = [
            "affsaison" => $affSaison,
            "conseils" => $manager->findAll($sqlOptions),
            'form' => $form,
        ];
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
        }
        header('location:conseil');
    }

    public function deleteConseil()
    {
        if (isset($_POST['deleteConseil'])) {
            $manager = new ConseilManager($this->bdd, Conseil::class);
            $manager->delete();
        }
        header('location:conseil');
    }

}

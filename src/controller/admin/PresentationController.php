<?php
// --- src/controller/admin/PresentationController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use \wcs\model\Presentation;
use \wcs\model\PresentationManager;
use wcs\model\Prestation;

/**
 * Class PresentationController
 * page d'admin pour la presentation
 * @package wcs\controller\admin
 */
class PresentationController extends Controller
{

    /**
     * **********************************************************
     * premier acces a la page
     * @return mixed
     */
    public function index()
    {
        $manager = new PresentationManager($this->bdd, Presentation::class);
        $params = [
            'rubriques' => ['Présentation générale', 'Valeurs 1', 'Valeurs 2'],
            'infos' => $manager->findAll('ORDER BY id'),
        ];
        return $this->twig->render('presentation/Presentation.twig', $params);
    }

    /**
     * **********************************************************
     * Acces apres clic sur bouton enregistrer
     *
     */
    public function modifiePresentation()
    {
        // --- on recupere les infos
        $titre1 = trim($_POST['titre1']);
        $contenu1 = trim($_POST['contenu1']);
        $titre2 = trim($_POST['titre2']);
        $contenu2 = trim($_POST['contenu2']);
        $titre3 = trim($_POST['titre3']);
        $contenu3 = trim($_POST['contenu3']);
        $manager = new PresentationManager($this->bdd, Presentation::class);
        // --- on controle si tous les champs sont renseignes
        $ok = true;
        if ( $titre1 == '' || $contenu1 == '' || $titre2 == '' || $contenu2 == '' || $titre3 == '' || $contenu3 == '' ) {
            // --- controler si titre presentation generale saisi
            $erreur = 'Tous les champs doivent être saisis (pas de contenu vide).';
            $ok = false;
        }
        if ( $ok ) {
            // --- mise a jour des enregistrements

            $presentation = new Presentation();
            $presentation->setId(1);
            $presentation->setTitre($titre1);
            $presentation->setContenu($contenu1);
            $manager->update($presentation);
            $presentation->setId(2);
            $presentation->setTitre($titre2);
            $presentation->setContenu($contenu3);
            $manager->update($presentation);
            $presentation->setId(3);
            $presentation->setTitre($titre3);
            $presentation->setContenu($contenu3);
            $manager->update($presentation);

            // --- recharger page index
            header('location:index.php?p=presentation');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'rubriques' => ['Présentation générale', 'Valeurs 1', 'Valeurs 2'],
                'infos' => [
                    ['id' => 1, 'titre' => $titre1, 'contenu' => $contenu1],
                    ['id' => 2, 'titre' => $titre2, 'contenu' => $contenu2],
                    ['id' => 3, 'titre' => $titre3, 'contenu' => $contenu3],
                ],
                'erreur' => $erreur,
            ];
            return $this->twig->render('presentation/Presentation.twig', $params);
        }
    }

}
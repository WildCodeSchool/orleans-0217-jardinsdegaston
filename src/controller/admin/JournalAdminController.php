<?php
// --- src/controller/admin/PrestationController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use \wcs\model\Journal;
use \wcs\model\JournalManager;

/**
 * Class JournalAdminController
 * page d'admin du journal (visu, ajout, modif supp)
 * @package wcs\controller\admin
 */
class JournalAdminController extends Controller
{

    /**
     * **********************************************************
     * premier acces a la page
     * @return mixed
     */
    public function index()
    {
        $this->img->resetTmp('J');
        $manager = new JournalManager($this->bdd, Journal::class);
        $tmpinfos = ['id' => 0, 'titre' => '', 'contenu' => '', 'date' =>'', 'tmpimage' => $this->img->getTmpName('P')];
        $params = [
            'articles' => $manager->findAllReverse('journal'),
            'tmpinfos' => $tmpinfos,
        ];
        return $this->twig->render('journal/Journal_admin.twig', $params);
    }

    /**
     * **********************************************************
     * Fait fonctionner l'ajout d'article
     * @return mixed
     */
    public function ajoutArticle()
    {
        if ( isset($_POST['annule']) ) {
            header('location:index.php?p=chezgaston');
        }
        $erreur = '';
        $article = new Journal;

        $date = new \Datetime($_POST['date']);
        $article->hydrate(0, $_POST['titre'], $_POST['contenu'], $date);

        /* -- creation d'un paramètre contenant la liste des articles existants --*/
        $articlesManager = new JournalManager($this->bdd, Journal::class);
        $articles = $articlesManager->findAllReverse('journal');

        $ok = true;
        if ( !$this->img->tmpImgExists('J') ) {
            // --- controle si image chargee
            $erreur = 'Charger d\'abord une image.';
            $ok = false;
        }
        elseif ( !isset($_POST['titre']) || trim($_POST['titre']) == '') {
            // --- controler si titre saisi
            $erreur = 'La saisie d\'un titre est obligatoire.';
            $ok = false;
        }

        if ( $ok === true ) {
            $manager = new JournalManager($this->bdd, Journal::class);
            // --- enregistrer la nouvelle presta
            $article = $manager->addOrUpdateArticle($article);

            // --- recuperer son id
            $id = $_POST['id'];

            // --- deplacer image temporaire vers emplacement définitif
            $this->img->deplace('J', $id);
            // --- recharger page index
            header('location:index.php?p=chezgaston');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'articles' => $articles,
                'article' => $article,
                'tmpimage' => $this->img->getTmpName('J'),
                'erreur' => $erreur,
            ];
            return $this->twig->render('journal/Journal_admin.twig', $params);
        }
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
            $manager = new JournalManager($this->bdd, Journal::class);
            $erreur = '';
            $params = [
                'articles' => $manager->findOne($id),
                'tmpimage' => $this->img->getTmpName('J'),
                'erreur' => $erreur,
            ];
            if ( isset($_POST['supprime']) ) {
                return $this->twig->render('journal/SupprimeArticle.twig', $params);
            }
            else {
                return $this->twig->render('journal/ModifieArticle.twig', $params);
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
        if ( false === $this->img->recupImg('J') ) {
            $erreur = 'Problème de transfert d\'image. Chargement abandonné.';
            $this->img->resetTmp('J');
        }
        // --- recuperation des infos $_POST
        $id = $_POST['id'];

        $manager = new JournalManager($this->bdd, Journal::class);
        $articles = $manager->findAllReverse('journal');

        $article = new Journal;
        $date = new \DateTime($_POST['date']);
        $article->hydrate(0, $_POST['titre'], $_POST['contenu'], $date);

        $params = [
            'articles' => $articles,
            'article' => $article,
            'tmpimage' => $this->img->getTmpName('J'),
            'erreur' => $erreur,
        ];

        if ( $id == 0 ) {
            return $this->twig->render('journal/Journal_admin.twig', $params);
        }
/*        else {
            return $this->twig->render('journal/ModifieArticle.twig', $params);
        }*/
    }

    /**
     * **********************************************************
     * Traitement de la modification d'une prestation
     * @return mixed
     */
    public function majArticle()
    {
        if ( isset($_POST['abandon']) ) {
            header('location:index.php?p=journal');
        }
        $erreur = '';
        $article = new Journal;
        $date = new \Datetime($_POST['date']);
        $article->hydrate(intval($_POST['id']), $_POST['titre'], $_POST['contenu'], $date);
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
            $manager = new JournalManager($this->bdd, Journal::class);
            $manager->writeArticle($article);

            // --- recharger page index
            header('location:index.php?p=journal');
        }
        else {
            // --- recharger la page en affichant l'erreur
            $params = [
                'article' => $article,
                'tmpimage' => $this->img->getTmpName('P'),
                'erreur' => $erreur,
            ];
            return $this->twig->render('journal/ModifieArticle.twig', $params);
        }
    }

    /**
     * **********************************************************
     * Suppression d'une prestation
     */
    public function delpresta()
    {
        if ( isset($_POST['supprime']) ) {
            $manager = new JournalManager($this->bdd, Journal::class);
            // --- suppression de la prestation
            $manager->delOne($_POST['id']);
            // --- reorganisation de l'ordre d'affichage
            //$manager->delOrdreAff($_POST['ordreaff']);
            // --- suppression de l'image attachee
            $this->img->delImg('P', $_POST['id']);
        }
        header('location:index.php?p=journal');

    }

}
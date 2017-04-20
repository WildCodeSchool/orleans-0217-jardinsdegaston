<?php
// --- src/controller/admin/PrestationController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use \wcs\model\Journal;
use \wcs\model\JournalManager;
use \wcs\form\ArticleForm;
use \wcs\form\ArticleFilter;
use Zend\Form\Element\DateTime;

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
        //$this->img->resetTmp('J');
        $manager = new JournalManager($this->bdd, Journal::class);
        $form = new ArticleForm();
        $filter = new ArticleFilter();
        $form->setInputFilter($filter);

        $params = [
                'articles' => $manager->findAllReverse('journal'),
                'form' => $form,
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
        $form = new ArticleForm();

        /* -- creation d'une variable contenant la liste des articles existants --*/
        $articlesManager = new JournalManager($this->bdd, Journal::class);

        if (isset($_POST['ajoutArticle'])) {

            $filter = new ArticleFilter();
            $form->setInputFilter($filter);
            $form->setData($_POST + $_FILES);


            $imgErr = [];
            $titreErr = [];
            $dateErr = [];
            $contenuErr = [];

            if ($form->isValid()) {
                $manager = new JournalManager($this->bdd, Journal::class);
                $article = new Journal;
                $data = $form->getData();
                $titre = $data['titre'];
                $contenu = $data['contenu'];
                $date = new \DateTime($data['date']);
                $article->hydrate(0, $titre, $contenu, $date);
                $id = $manager->addArticle($article);
                $image = $data['imgArticle'];
                $imgName = 'imgJ-' . $id . '.jpg';
                move_uploaded_file($image['tmp_name'], PUBLIC_IMG . $imgName);

            } else {
                $imgErr = $form->get('imgArticle')->getMessages();
                $titreErr = $form->get('titre')->getMessages();
                $dateErr = $form->get('date')->getMessages();
                $contenuErr = $form->get('contenu')->getMessages();
            }

            $articles = $articlesManager->findAllReverse('journal');

            /* definition des paramètres à envoyer à twig */
            $params = [
                'articles' => $articles,
                'form' => $form,
                'imgErr' => $imgErr,
                'titreErr' => $titreErr,
                'dateErr' => $dateErr,
                'contenuErr' => $contenuErr
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
                'article' => $manager->findOne($id),
                'image' => 'imgJ-' . $id . '.jpg',
                'erreur' => $erreur,
            ];

            return $this->twig->render('journal/ModifieArticle.twig', $params);

        } else {

            // --- ERREUR l'id n'est pas défini ---
        }
    }

    /**
     * **********************************************************
     * Affiche la page suppression
     * @return mixed
     */
    public function supprime()
    {
        if (isset($_POST['id']) ) {
            $id = $_POST['id'];
            $manager = new JournalManager($this->bdd, Journal::class);
            $erreur = '';
            $params = [
                'article' => $manager->findOne($id),
                'image' => 'imgJ-' . $id . '.jpg',
                'erreur' => $erreur,
            ];

            return $this->twig->render('journal/SupprimeArticle.twig', $params);

        } else {

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

            header('location:index.php?p=chezgaston');

        } elseif (isset($_POST['valide'])) {

            $article = new Journal;
            $date = new \DateTime($_POST['date']);
            $article->hydrate(intval($_POST['id']), $_POST['titre'], $_POST['contenu'], $date);

            // --- mise a jour de l'enregistrement
            $manager = new JournalManager($this->bdd, Journal::class);
            $manager->updateArticle($article);

            $id = $_POST['id'];
            $image = $_FILES['imgModif'];
            $imgName = 'imgJ-' . $id . '.jpg';
            move_uploaded_file($image['tmp_name'], PUBLIC_IMG . $imgName);

            header('location:index.php?p=chezgaston');
        }
    }

    /**
     * **********************************************************
     * Suppression d'une prestation
     */
    public function delArticle()
    {
        if ( isset($_POST['supprime']) ) {
            $manager = new JournalManager($this->bdd, Journal::class);
            // --- suppression de la prestation
            $manager->delOne($_POST['id']);

            // --- suppression de l'image attachee
            $this->img->delImg('J', $_POST['id']);
        }
        header('location:index.php?p=chezgaston');

    }

}
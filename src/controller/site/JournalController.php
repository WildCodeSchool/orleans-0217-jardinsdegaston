<?php
/**
 * Created by PhpStorm.
 * User: wilder3
 * Date: 06/04/17
 * Time: 19:15
 */

namespace wcs\controller\site;

use wcs\controller\Controller;
use wcs\model\DbManager;
use wcs\model\JournalManager;
use wcs\form\ArticleForm;
use wcs\model\Journal;

class JournalController extends Controller
{

    public function index()
    {
        $journal = new JournalManager($this->bdd, Journal::class);
        $article = $journal->findAllReverse('journal');
        return $this->twig->render('site/journal.twig', ['article'=>$article]);
    }

    public function add()
    {
        $form = new ArticleForm();

        if (isset($_POST['Envoyer'])) {
            $form->setData($_POST);

            if ($form->isValid()) {
                echo 'L\'article a bien été ajouté.';
            }
        }
    }

}

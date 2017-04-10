<?php
/**
 * Created by PhpStorm.
 * User: wilder3
 * Date: 06/04/17
 * Time: 19:15
 */

namespace wcs\controller;

use wcs\model\DB;
use wcs\form\ArticleForm;
use wcs\model\Journal;

class JournalController extends Controller
{

    public function index()
    {
        $journal = new Journal();
        $article = $journal->findAllReverse('journal');
        return $this->twig->render('journal.twig', ['article'=>$article]);
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

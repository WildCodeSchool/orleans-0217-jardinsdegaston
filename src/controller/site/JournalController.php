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

        $mois = [
            '01' => 'janvier',
            '02' => 'février',
            '03' => 'mars',
            '04' => 'avril',
            '05' => 'mai',
            '06' => 'juin',
            '07' => 'juillet',
            '08' => 'août',
            '09' => 'septembre',
            '10' => 'octobre',
            '11' => 'novembre',
            '12' => 'décembre',
        ];

        $journal = new JournalManager($this->bdd, Journal::class);
        $articles = $journal->findAllReverse('journal');
        return $this->twig->render('journal.twig', ['articles'=> $articles,
                                                        'mois' => $mois]);
    }

}

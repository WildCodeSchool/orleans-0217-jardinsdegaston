<?php
/**
 * Created by PhpStorm.
 * User: wilder3
 * Date: 10/04/17
 * Time: 10:59
 */

namespace wcs\controller;


class AccueilController extends Controller
{

    public function index()
    {
        return $this->twig->render('accueil.twig');
    }

}
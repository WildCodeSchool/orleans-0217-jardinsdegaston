<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 01/04/17
 * Time: 21:07
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;


class RealisationController extends Controller
{


    public function index()
    {
        /* --- provisoire --- */
        $realisations = [
            ['id' => 1, 'titre' => 'Titre réalisation 1', 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 'id_img_ap' => 7, 'id_img_av' => 8],
            ['id' => 2, 'titre' => 'Titre réalisation 1', 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', 'id_img_ap' => 9, 'id_img_av' => 10],
        ];

        return $this->twig->render('Realisation.twig',['realisations' => $realisations]);
    }




}
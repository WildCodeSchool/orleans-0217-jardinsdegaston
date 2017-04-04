<?php

namespace wcs\controller\admin;
use \wcs\controller\Controller;

/**
 * Class BgImageController
 * Controlleur permettant la gestion des images de fond
 * @package wcs\adm\controller
 */
class BgImageController extends Controller
{

    public function index()
    {
        /* --- provisoire --- */
        $saisons = ['Printemps', 'Eté', 'Automne', 'Hiver'];
        $bgimg1 = [
            ['nom' =>'Printemps', 'bgimg1' => 5, 'bgimg2' => 1],
            ['nom' =>'Eté', 'bgimg1' => 1, 'bgimg2' => 1],
            ['nom' =>'Automne', 'bgimg1' => 1, 'bgimg2' => 1],
            ['nom' =>'Hiver', 'bgimg1' => 1, 'bgimg2' => 1],
        ];
        $bgimg2 = [
            ['nom' =>'Printemps', 'bgimg1' => 1, 'bgimg2' => 1],
            ['nom' =>'Eté', 'bgimg1' => 1, 'bgimg2' => 6],
            ['nom' =>'Automne', 'bgimg1' => 1, 'bgimg2' => 1],
            ['nom' =>'Hiver', 'bgimg1' => 1, 'bgimg2' => 1],
        ];
        $galerie = [
            ['id' => 5, 'saison' => 'Printemps'],
            ['id' => 6, 'saison' => 'Eté'],
        ];
//        $bgimg = new BgImage;
//        $param = [
//            'saisons' => $saisons,
//            'bgimg1' => $bgimg->getImgP(),
//            'bgimg2' => $bgimg->getImgS(),
//            'galerie' => $bgimg->getImg(),
//        ];


        return $this->twig->render('BgImage.twig',['saisons' => $saisons, 'bgimg1' => $bgimg1, 'bgimg2' => $bgimg2, 'galerie' => $galerie]);
    }



}
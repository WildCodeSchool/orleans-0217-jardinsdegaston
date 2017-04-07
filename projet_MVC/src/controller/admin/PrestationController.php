<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 01/04/17
 * Time: 22:27
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;

class PrestationController extends Controller
{


    public function index()
    {
        /* --- provisoire --- */
        $prestations = [
            ['id' => 1, 'titre' => 'Entretien des pelouses', 'contenu' => 'Tonte, émoussage, scarification, regarnissage, ...', 'id_img' => 11, 'ordreaff' => 1],
            ['id' => 2, 'titre' => 'Taille de haies', 'contenu' => 'Taille des haies, arbustes, arbres fruitiers, ...', 'id_img' => 12, 'ordreaff' => 2],
            ['id' => 3, 'titre' => 'Entretien des massifs', 'contenu' => 'Entretien des massifs, désherbage, paillage, ...', 'id_img' => 13, 'ordreaff' => 3],
            ['id' => 4, 'titre' => 'Potager', 'contenu' => 'Mise en place et entretien de potagers, ...', 'id_img' => 14, 'ordreaff' => 4],
            ['id' => 5, 'titre' => 'Evacuation des déchets végétaux', 'contenu' => 'Evacuation des déchets végétaux, ...', 'id_img' => 15, 'ordreaff' => 5],
            ['id' => 6, 'titre' => 'Entretien des extérieurs', 'contenu' => 'Déneigement, peinture, lasure, nettoyage haute pression, ...', 'id_img' => 16, 'ordreaff' => 6],
        ];

        return $this->twig->render('Prestation.twig',['prestations' => $prestations]);
    }




}
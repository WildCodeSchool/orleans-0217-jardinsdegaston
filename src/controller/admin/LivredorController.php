<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:06
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;



class LivredorController extends Controller
{
    public function index()
    {
        // --- provisoire ---
        $test = [   '0' =>
            [   'Nom' => 'Mr.pouet',
                'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '1' =>
                [   'Nom' => 'Mme.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '2' =>
                [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '3' =>
                [   'Nom' => 'Mme.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '4' =>
                [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '5' =>
                [   'Nom' => 'Mr.pouet',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor']
        ];

        return $this->twig->render('Livredor.twig', ['post' => $this->post, 'test' => $test]);
    }
}
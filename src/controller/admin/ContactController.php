<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:38
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;



class ContactController extends Controller
{
    public function index()
    {
        $test = [
            '0' =>
                [   'Nom' => 'pouet',
                'Prenom' => 'Pouet',
                'Email' => 'pouet@pouet.com',
                'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '1' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '2' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '3' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
            '4' =>
                [   'Nom' => 'pouet',
                    'Prenom' => 'Pouet',
                    'Email' => 'pouet@pouet.com',
                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor']
        ];

        return $this->twig->render('contact/Contact.twig', ['post' => $this->post, 'test' => $test]);
    }
}
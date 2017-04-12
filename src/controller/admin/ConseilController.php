<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 08:06
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;


class ConseilController extends Controller
{

    public function index()
    {
        /* --- provisoire --- */
        $affsaisons = ['Printemps', 'Eté', 'Automne', 'Hiver'];
        $saisons = ['Prin.', 'Eté', 'Aut.', 'Hiv.'];
        $conseils = [
            ['id' => 1, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => 'peah'],
            ['id' => 2, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => 'p   '],
            ['id' => 3, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => 'pe  '],
            ['id' => 4, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => '  ah'],
            ['id' => 5, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => '   h'],
            ['id' => 6, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => 'p  h'],
            ['id' => 7, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => '  a '],
            ['id' => 8, 'contenu' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'saison' => '  a '],
        ];

        return $this->twig->render('conseil/Conseil.twig', ['post' => $this->post, 'affsaisons' => $affsaisons, 'saisons' => $saisons, 'conseils' => $conseils]);

    }


}
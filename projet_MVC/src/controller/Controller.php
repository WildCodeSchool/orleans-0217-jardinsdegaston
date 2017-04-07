<?php
// --- src/controller/Controller.php ---

namespace wcs\controller;
//use \vendor\

/**
 * Classe mere de tous les controleurs
 *
 * @package wcs\controller
 */
class Controller
{
    /**
     * recuperation des entrees $_POST (si existe)
     * @var array
     */
    protected $post = [];

    /**
     * objet twig initialise
     * @var
     */
    protected $twig;


    public function __construct($twig, $post=[])
    {
        $this->twig = $twig;
        $this->post = $post;
    }

    public function render ($path, $param)
    {
        // transforme un tableau de clé / valeur en variable
        // ex ['eleve'=>'toto', 'ecole'=>'orléans'] sera transformé en $eleve='toto' et $ecole='orleans'
        // du coup, dans le fichier $path appelé ensuite, on peut utiliser directement les variables $eleve et $ecole
        extract($param);

        require '../src/view/'.$path;

    }

    /**
     * function permettant de faire le rendu d'une vue
     * @param $path (le  fichier twig a utiliser pour le rendu)
     * @param $param (la liste des parametres necesaires pour le rendu twig)
     * @return string (le code html a afficher)
     */
//    public function render ($path, $param)
//    {
//        // transforme un tableau de clé / valeur en variable
//        // ex ['eleve'=>'toto', 'ecole'=>'orléans'] sera transformé en $eleve='toto' et $ecole='orleans'
//        // du coup, dans le fichier $path appelé ensuite, on peut utiliser directement les variables $eleve et $ecole
//        extract($param);
//
//        // crée un buffer (tampon) , c'est à dire met en "pause" l'affichage de php
//        ob_start();
//        // si on ne fait pas de mise en tampon, le fichier $path s'affiche au moment de require (comme si on faisait un echo), ce qui n'est pas voulu
//        require '../../src/view/'.$path;
//        // récupère tout ce qui a été mis en tampon et l'enregistre dans la variable buffer
//        $buffer = ob_get_clean();
//
//        return $buffer;
//    }
}
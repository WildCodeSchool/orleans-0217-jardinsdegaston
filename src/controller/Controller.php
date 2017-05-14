<?php
// --- src/controller/Controller.php ---

namespace wcs\controller;
use \wcs\model\Image;

/**
 * Classe mere de tous les controleurs
 *
 * @package wcs\controller
 */
class Controller
{
    /**
     * connexion base de donnees
     * @var PDO
     */
    protected $bdd;

    /**
     * objet twig initialise
     * @var \Twig_Environment
     */
    protected $twig;

    /**
     * @var
     */
    protected $img;

    /**
     * Libelle des saisons
     * @var array
     */
    protected $saisons = [
        'P' => ['nom' => 'Printemps', 'numsaison' => 1],
        'E' => ['nom' => 'Eté', 'numsaison' => 2],
        'A' => ['nom' => 'Automne', 'numsaison' => 3],
        'H' => ['nom' => 'Hiver', 'numsaison' => 4]
    ];


    public function __construct($twig, \PDO $bdd)
    {
        $this->setTwig($twig);
        $this->setBdd($bdd);
        if ( !isset($this->img) ) {
            $this->img = new Image();
        }
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
     * @return PDO
     */
    public function getBdd(): PDO
    {
        return $this->bdd;
    }

    /**
     * @param PDO $bdd
     */
    public function setBdd(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    /**
     * @return mixed
     */
    public function getTwig()
    {
        return $this->twig;
    }

    /**
     * @param mixed $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    public function getNomSaison($codesaison) : string
    {
        return $this->saison[$codesaison]['nom'];
    }
    public function getSaisons() : array
    {
        $noms = [];
        foreach ( $this->saisons as $key => $value ) {
            $noms[] = $value['nom'];
        }
        return $noms;
    }
    public function getNumSaison($codesaison) : int
    {
        return $this->saisons[$codesaison]['numsaison'];
    }

}
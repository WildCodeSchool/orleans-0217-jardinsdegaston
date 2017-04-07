<?php

namespace wcs\model;

/**
 * Modele (entity) correspondant à la table image de la base de donnees. Un objet Image est instancie et hydrate
 * automatiquement lors de l'utilisation de pdo fetchAll avec le style FETCH_CLASS
 * @class Eleve
 */

class Image extends DB
{

    /* --- Proprietes --------------------------------- */
    /**
     * index dans la table
     * @var integer
     */
    private $id;

    /**
     * identifie le type d'image : B = background (1920x1200), P = prestations (400x400), R = realisation (750x400), j = journal (..x..)
     * @var char
     */
    private $rubrique;

    /**
     * date de (re)chargement de l'image
     * @var DateTime
     */
    private $date;


    /* --- Geters et setters -------------------------- */
    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(int $id) : Image
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRubrique() : string
    {
        return $this->rubrique;
    }

    /**
     * @param mixed $rubrique
     */
    public function setRubrique($rubrique) : Image
    {
        $this->rubrique = $rubrique;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate() : \DateTime
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date) : Image
    {
        $this->date = $date;
        return $this;
    }

}
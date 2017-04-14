<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 08:45
 */

namespace wcs\model;


class Realisation
{

    /* --- Proprietes ------------------------------------------- */

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var int
     */
    private $activation;

    /* --- Geters et setters ------------------------------------- */

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Realisation
     */
    public function setId(int $id) : Realisation
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre) : Realisation
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu($contenu) : Realisation
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return int
     */
    public function getActivation() : int
    {
        return $this->activation;
    }

    /**
     * @param int $activation
     * @return Realisation
     */
    public function setActivation(int $activation) : Realisation
    {
        $this->activation = $activation;
        return $this;
    }

    public function hydrate(int $id, string $titre, string $contenu='', int $activation)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setContenu($contenu);
        $this->setActivation($activation);
    }


}
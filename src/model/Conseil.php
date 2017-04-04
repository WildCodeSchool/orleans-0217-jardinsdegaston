<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:13
 */

namespace wcs\model;


class Conseil
{

    /* --- Proprietes --------------------------------- */
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var string
     */
    private $saison;


    /* --- Geters et setters -------------------------- */
    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Conseil
     */
    public function setId(int $id) : Conseil
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContenu() : string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     * @return Conseil
     */
    public function setContenu(string $contenu) : Conseil
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return string
     */
    public function getSaison() : string
    {
        return $this->saison;
    }

    /**
     * @param string $saison
     * @return Conseil
     */
    public function setSaison(string $saison) : Conseil
    {
        $this->saison = $saison;
        return $this;
    }


}
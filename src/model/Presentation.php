<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 08:35
 */

namespace wcs\model;


class Presentation
{

/* --- Proprietes --------------------------------- */
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
     * @return Presentation
     */
    public function setId(int $id) : Presentation
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre() : string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Presentation
     */
    public function setTitre(string $titre) : Presentation
    {
        $this->titre = $titre;
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
     * @return Presentation
     */
    public function setContenu(string $contenu) : Presentation
    {
        $this->contenu = $contenu;
        return $this;
    }


}
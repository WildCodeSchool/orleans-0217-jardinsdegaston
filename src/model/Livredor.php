<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:19
 */

namespace wcs\model;


class Livredor
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
    private $auteur;


    /* --- Geters et setters -------------------------- */
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Livredor
     */
    public function setId(int $id): Livredor
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     * @return Livredor
     */
    public function setContenu(string $contenu): Livredor
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @param string $nom
     * @return Livredor
     */
    public function setAuteur(string $auteur): Livredor
    {
        $this->auteur = $auteur;
        return $this;
    }



}
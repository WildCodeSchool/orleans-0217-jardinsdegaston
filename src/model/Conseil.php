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
     * @var int
     */
    private $printemps;

    /**
     * @var int
     */
    private $ete;

    /**
     * @var int
     */
    private $automne;

    /**
     * @var int
     */
    private $hiver;


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
    public function getPrintemps() : int
    {
        return $this->printemps;
    }

    /**
     * @param string $printemps
     * @return Conseil
     */
    public function setPrintemps(int $printemps) : Conseil
    {
        $this->printemps = $printemps;
        return $this;
    }

    /**
     * @return string
     */
    public function getEte() : int
    {
        return $this->ete;
    }

    /**
     * @param string $ete
     * @return Conseil
     */
    public function setEte(int $ete) : Conseil
    {
        $this->ete = $ete;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutomne() : int
    {
        return $this->automne;
    }

    /**
     * @param string $automne
     * @return Conseil
     */
    public function setAutomne(int $automne) : Conseil
    {
        $this->automne = $automne;
        return $this;
    }

    /**
     * @return string
     */
    public function getHiver() : int
    {
        return $this->hiver;
    }

    /**
     * @param string $hiver
     * @return Conseil
     */
    public function setHiver(int $hiver) : Conseil
    {
        $this->hiver = $hiver;
        return $this;
    }

    public function hydrate(int $id, string $contenu, int $printemps, int $ete, int $automne, int $hiver)
    {
        $this->setId($id);
        $this->setContenu($contenu);
        $this->setPrintemps($printemps);
        $this->setEte($ete);
        $this->setAutomne($automne);
        $this->setHiver($hiver);
    }

}
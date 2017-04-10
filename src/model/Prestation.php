<?php
// --- src/models/Prestation.php ---

namespace wcs\model;


class Prestation
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
    private $ordreAff;

    /* --- Geters et setters ------------------------------------- */

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $idImg
     * @return Prestation
     */
    public function setId(int $id) : Prestation
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
    public function setTitre($titre) : Prestation
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
    public function setContenu($contenu) : Prestation
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrdreAff() : int
    {
        return $this->ordreAff;
    }

    /**
     * @param int $ordreAff
     * @return Prestation
     */
    public function setOrdreAff(int $ordreAff) : Prestation
    {
        $this->ordreAff = $ordreAff;
        return $this;
    }

    public function hydrate(int $id, string $titre, string $contenu='', int $ordreaff)
    {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setContenu($contenu);
        $this->setOrdreAff($ordreaff);
    }
}

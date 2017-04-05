<?php
// --- src/model/BgImage ---

namespace wcs\model;


class BgImage extends DB
{

    /* --- Proprietes --------------------------------- */
    /**
     * index dans la table
     * image principale : id 1 = printemps, id 2 = ete, id 3 = automne, id 4 = hiver
     * image secondaire : id 5 = printemps, id 6 = ete, id 7 = automne, id 8 = hiver
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $saison;

    /**
     * @var int
     */
    private $idImg;


    /* --- Geters et setters -------------------------- */
    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSaison() : string
    {
        return $this->saison;
    }

    /**
     * @return int
     */
    public function getIdImg() : int
    {
        return $this->idImg;
    }

    /**
     * @param int $id
     * @return BgImage
     */
    public function setIdImg(int $idImg) : Bgimage
    {
        $this->idImg = $idImg;
        return $this;
    }

    /**
     * Retourne un tableau des quatre images bg principales
     * @param int $id
     */
    public function getImgP()
    {
        return $this->findAll('bgimage', 'WHERE id<5 ORDER BY id');
    }

    /**
     * Retourne un tableau des quatre images bg secondaires
     * @param int $id
     */
    public function getImgS()
    {
        return $this->findAll('bgimage', 'WHERE id>4 ORDER BY id');
    }

    /**
     * retourne un tableau des images de la galerie bg
     * toutes les images si $id n'est pas precise, l'image $id sinon
     * @param int $id
     */
    public function getImg($id=0)
    {
        if ( $id == 0 ) {
            $opt = "WHERE rubrique='B' AND id>3 ORDER BY saison";
        }
        else {
            $opt = "WHERE id=$id";
        }
        return $this->findAll('image', $opt);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:41
 */

namespace wcs\model;


class BgImage
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
     * @param int $id
     * @return BgImage
     */
    public function setId(int $id) : BgImage
    {
        $this->id = $id;
        return $this;
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
    public function setIdImg(int $idImg) : BgImage
    {
        $this->idImg = $idImg;
        return $this;
    }

    public function

}
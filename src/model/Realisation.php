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

    /* --- Proprietes ----------------------------- */

    /**
     * @var int
     */
    private $idImgAv;

    /**
     * @var int
     */
    private $idImgAp;


    /* --- Geters et setters ---------------------- */

    /**
     * @return int
     */
    public function getIdImgAv()
    {
        return $this->idImgAv;
    }

    /**
     * @param int $idImgAv
     * @return Realisation
     */
    public function setIdImgAv(int $idImgAv) : Realisation
    {
        $this->idImgAv = $idImgAv;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdImgAp() : int
    {
        return $this->idImg_ap;
    }

    /**
     * @param int $idImgAp
     * @return Realisation
     */
    public function setIdImgAp(int $idImgAp) : Realisation
    {
        $this->idImgAp = $idImgAp;
        return $this;
    }



}
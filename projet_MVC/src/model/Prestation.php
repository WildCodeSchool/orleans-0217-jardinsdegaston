<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:06
 */

namespace wcs\model;


class Prestation extends Presentation
{

    /* --- Proprietes ----------------------------- */

    /**
     * @var int
     */
    private $idImg;

    /**
     * @var int
     */
    private $ordreAff;


    /* --- Geters et setters ---------------------- */

    /**
     * @return int
     */
    public function getIdImg() : int
    {
        return $this->idImg;
    }

    /**
     * @param int $idImg
     * @return Prestation
     */
    public function setIdImg(int $idImg) : Prestation
    {
        $this->idImg = $idImg;
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


}
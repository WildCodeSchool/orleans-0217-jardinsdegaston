<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:23
 */

namespace wcs\model;


class Contact extends Livredor
{

    /* --- Proprietes --------------------------------- */

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $email;

    /**
     * @var DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $statut;


    /* --- Geters et setters -------------------------- */
    /**
     * @return string
     */
    public function getPrenom() : string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Contact
     */
    public function setPrenom(string $prenom) : Contact
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return Contact
     */
    public function setEmail($email) : Contact
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate() : DateTime
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return Message
     */
    public function setDate($date) : Contact
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatut() : int
    {
        return $this->statut;
    }

    /**
     * @param $statut
     * @return Message
     */
    public function setStatut($statut) : Contact
    {
        $this->statut = $statut;
        return $this;
    }



}
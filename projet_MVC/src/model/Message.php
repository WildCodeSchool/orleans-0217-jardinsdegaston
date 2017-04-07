<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:23
 */

namespace wcs\model;


class Message extends Livredor
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
     * @return Message
     */
    public function setPrenom(string $prenom) : Message
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
     * @return Message
     */
    public function setEmail($email) : Message
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
    public function setDate($date) : Message
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
    public function setStatut($statut) : Message
    {
        $this->statut = $statut;
        return $this;
    }



}
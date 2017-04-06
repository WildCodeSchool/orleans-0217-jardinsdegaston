<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 09:19
 */

namespace wcs\model;


class Livredor extends DB
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
    private $nom;


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
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Livredor
     */
    public function setNom(string $nom): Livredor
    {
        $this->nom = $nom;
        return $this;
    }

    public function getLdor()
    {
        return $this->findAll('livredor');
    }

//    public function addLdorQuery($query)
//    {
//        $query = "INSERT INTO livredor (nom, contenu) VALUES (:NomLDor, :TexteLDor)";
//        return $this->addLdorQuery();
//    }
}
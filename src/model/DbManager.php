<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 07/04/17
 * Time: 17:12
 */

namespace wcs\model;


class DbManager
{
    /**
     * @var \PDO
     */
    private $bdd;

    /**
     * @var Object
     */
    private $entity;

    /**
     * @return \PDO
     */
    public function getBdd()
    {
        return $this->bdd;
    }

    /**
     * @param \PDO $bdd
     * @return DbManager
     */
    public function setBdd(\PDO $bdd)
    {
        $this->bdd = $bdd;
        return $this;
    }

    /**
     * @return Object
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param Object $entity
     * @return DbManager
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }



    public function __construct(\PDO $bdd, $entityClassName)
    {
        $this->setBdd($bdd);
        $this->setEntity($entityClassName);
    }

    public function findAll($opt=null)
    {
        $elements = explode('\\', $this->getEntity());
        $table = strtolower(end($elements));
        $req = "SELECT * FROM $table";
        if ( null !== $opt ) {
            $req .= " ".$opt;
        }
        $res = $this->getBdd()->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, $this->getEntity());
    }

}

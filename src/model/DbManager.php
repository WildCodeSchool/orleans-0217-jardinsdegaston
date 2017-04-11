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

    private $tableName;

    private function getTableName() : string
    {
        return $this->tableName;
    }

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
        // --- identification de la table SQL concernee
        $elements = explode('\\', $this->getEntity());
        $this->tableName = strtolower(end($elements));
        return $this;
    }

    public function __construct(\PDO $bdd, $entityClassName)
    {
        $this->setBdd($bdd);
        $this->setEntity($entityClassName);
    }

    public function findAll(string $opt=null) : array
    {
        $req = "SELECT * FROM " . $this->getTableName();
        if ( null !== $opt ) {
            $req .= " ".$opt;
        }
        $res = $this->getBdd()->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, $this->getEntity());
    }

    public function countAll(string $opt=null) : int
    {
        return count($this->findAll($opt));
    }

    public function findOne(int $id)
    {
        $req = "SELECT * FROM " . $this->getTableName()." WHERE id=$id";
        $res = $this->getBdd()->query($req);
        $ret = $res->fetchAll(\PDO::FETCH_CLASS, $this->getEntity());
        return $ret[0];
    }

    public function delOne(int $id) : int
    {
        $req = "DELETE FROM " . $this->getTableName()." WHERE id=$id";
        return $this->getBdd()->exec($req);
    }

}

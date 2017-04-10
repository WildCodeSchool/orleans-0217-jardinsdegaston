<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 07/04/17
 * Time: 17:26
 */

namespace wcs\model;


class PrestationManager extends DbManager
{
    public function getPrestaByName($name) : array
    {

    }

    public function writePrestation(Prestation $enr) : int
    {

        var_dump($enr);

        $id = $enr->getId();
        if ( $id == 0 ) {
            // --- creation d'un nouvel enregistrement
            $sql = "INSERT into prestation (titre, contenu, ordreaff) VALUES (:titre, :contenu, :ordreaff)";
            $pre = $this->getbdd()->prepare($sql);
            $pre->bindValue(':titre', $enr->getTitre(), \PDO::PARAM_STR);
            $pre->bindValue(':contenu', $enr->getContenu(), \PDO::PARAM_STR);
            $pre->bindValue(':ordreaff', ($this->countAll() + 1), \PDO::PARAM_INT);
        }
        else {
            // --- il s'agit d'une mise a jour
            $sql = "UPDATE prestation SET titre=:titre, contenu=:contenu WHERE id=$id";
            $pre = $this->getbdd()->prepare($sql);
            $pre->bindValue(':titre', $enr->getTitre(), \PDO::PARAM_STR);
            $pre->bindValue(':contenu', $enr->getContenu(), \PDO::PARAM_STR);
        }
        $pre->execute();
        if ( $id == 0 ) {
            $id = $this->getBdd()->lastInsertId();
        }
        return $id;
    }

    public function delOrdreAff(int $ordreaff)
    {
        $sql = "UPDATE prestation SET ordreaff=ordreaff-1 WHERE ordreaff>$ordreaff";
        return $this->getBdd()->exec($sql);
    }
}
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
        $id = $enr->getId();
        if ( $id == 0 ) {
            // --- creation d'un nouvel enregistrement
            $sql = "INSERT into prestation (titre, contenu, ordreAff) VALUES (:titre, :contenu, :ordreaff)";
            $pre = $this->getbdd()->prepare($sql);
            $pre->bindValue(':titre', $enr->getTitre(), \PDO::PARAM_STR);
            $pre->bindValue(':contenu', $enr->getContenu(), \PDO::PARAM_STR);
            $pre->bindValue(':ordreaff', ($this->countAll() + 1), \PDO::PARAM_INT);
        }
        else {
            // --- il s'agit d'une mise a jour
            $sql = "UPDATE prestation SET titre=:titre, contenu=:contenu, ordreAff=:ordreaff WHERE id=$id";
            $pre = $this->getbdd()->prepare($sql);
            $pre->bindValue(':titre', $enr->getTitre(), \PDO::PARAM_STR);
            $pre->bindValue(':contenu', $enr->getContenu(), \PDO::PARAM_STR);
            $pre->bindValue(':ordreaff', $enr->getOrdreAff(), \PDO::PARAM_INT);
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

    public function up(int $id, int $ordreaff)
    {
        // --- on recupere l'enregistrement ordreaff-1
        $pr = $this->findAll(' WHERE ordreaff='.($ordreaff-1));
        $pr = $pr[0];
        // --- on lui reaffecte ordreaff
        $pr->setOrdreAff($ordreaff);
        // --- on le reecrit
        $this->writePrestation($pr);
        // --- on recupere l'enregistrement a remonter
        $pr = $this->findOne($id);
        // --- on affecte ordreaff-1
        $pr->setOrdreAff($ordreaff-1);
        // --- on le reecrit
        $this->writePrestation($pr);
    }

    public function dn(int $id, int $ordreaff)
    {
        // --- on recupere l'enregistrement ordreaff+1
        $pr = $this->findAll(' WHERE ordreaff='.($ordreaff+1));
        $pr = $pr[0];
        // --- on lui reaffecte ordreaff
        $pr->setOrdreAff($ordreaff);
        // --- on le reecrit
        $this->writePrestation($pr);
        // --- on recupere l'enregistrement a remonter
        $pr = $this->findOne($id);
        // --- on affecte ordreaff+1
        $pr->setOrdreAff($ordreaff+1);
        // --- on le reecrit
        $this->writePrestation($pr);
    }

}
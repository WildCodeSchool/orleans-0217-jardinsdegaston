<?php
/**
 * Created by PhpStorm.
 * User: jeremie
 * Date: 11/04/17
 * Time: 17:17
 */

namespace wcs\model;

use wcs\form\ConseilForm;
use wcs\Form\ConseilFilter;


class ConseilManager extends DbManager
{
    public function add(Conseil $conseil)
    {
        $query = "INSERT INTO conseil (contenu, printemps, ete, automne, hiver) VALUES (:contenu, :printemps, :ete, :automne, :hiver)";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':contenu', $conseil->getContenu());
        $prep->bindValue(':printemps', $conseil->getPrintemps(), \PDO::PARAM_INT);
        $prep->bindValue(':ete', $conseil->getEte(), \PDO::PARAM_INT);
        $prep->bindValue(':automne', $conseil->getAutomne(), \PDO::PARAM_INT);
        $prep->bindValue(':hiver', $conseil->getHiver(), \PDO::PARAM_INT);
        $prep->execute();
    }

    public function update(Conseil $conseil)
    {
        $id = $_POST['id'];
        $query = "UPDATE conseil SET contenu=:contenu, printemps=:printemps, ete=:ete, automne=:automne, hiver=:hiver WHERE id=$id";
        $prep = $this->getbdd()->prepare($query);
        $prep->bindValue(':contenu', $conseil->getContenu());
        $prep->bindValue(':printemps', $conseil->getPrintemps(), \PDO::PARAM_INT);
        $prep->bindValue(':ete', $conseil->getEte(), \PDO::PARAM_INT);
        $prep->bindValue(':automne', $conseil->getAutomne(), \PDO::PARAM_INT);
        $prep->bindValue(':hiver', $conseil->getHiver(), \PDO::PARAM_INT);

        $prep->execute();
    }

    public function delete()
    {

        $query = "DELETE FROM conseil WHERE id=:id" ;
        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
        $prep->execute();
    }


    // A FINIR SI TEMPS OK
    /*public function findBySeason($saison)
    {
        foreach ($saison as $value)
        {
            // a finir si temps ok
            if ($value == 'printemps') {
                $req = "SELECT * FROM conseil WHERE printemps = 1";
            }

        }
        return $req;

        $res = $this->getBdd()->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, $this->getEntity());
    }*/
}

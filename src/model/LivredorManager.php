<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 10/04/17
 * Time: 19:04
 */

namespace wcs\model;


class LivredorManager extends DbManager
{
    public function getLdor()
    {
        return $this->findAll('livredor');
    }


    public function delete()
    {

        $query = "DELETE FROM livredor WHERE id=:id" ;
        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
        $prep->execute();
    }

    public function addorUpdate()
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $val) {
                $postClean[$key] = htmlentities(trim($val));
            }
        }


        if (!empty($_POST['id'])) {
            $query = "UPDATE livredor SET auteur=:NomLDor, contenu=:TexteLDor WHERE id=:id";
            $prep = $this->getBdd()->prepare($query);
            $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
            $prep->bindValue(':NomLDor', $postClean['NomLDor'], \PDO::PARAM_STR);
            $prep->bindValue(':TexteLDor', $postClean['TexteLDor'], \PDO::PARAM_STR);
            $prep->execute();
            return $this;
        }

        $query = "INSERT INTO livredor (auteur, contenu) VALUES (:NomLDor, :TexteLDor)";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':NomLDor', $postClean['NomLDor'], \PDO::PARAM_STR);
        $prep->bindValue(':TexteLDor', $postClean['TexteLDor'], \PDO::PARAM_STR);
        $prep->execute();
    }
}
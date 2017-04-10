<?php
/**
 * Created by PhpStorm.
 * User: jeremie
 * Date: 10/04/17
 * Time: 20:58
 */

namespace wcs\model;

class PresentationManager extends DbManager
{

    public function delete()
    {

        $query = "DELETE FROM presentation WHERE id=:id" ;
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
            $query = "UPDATE presentation SET titre=:TitrePresentation, contenu=:ContenuPresentation WHERE id=:id";
            $prep = $this->getBdd()->prepare($query);
            $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
            $prep->bindValue(':TitrePresentation', $postClean['TitrePresentation'], \PDO::PARAM_STR);
            $prep->bindValue(':ContenuPresentation', $postClean['ContenuPresentation'], \PDO::PARAM_STR);
            $prep->execute();
            return $this;
        }

        $query = "INSERT INTO presentation (titre, contenu) VALUES (:TitrePresentation, :ContenuPresentation)";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':TitrePresentation', $postClean['TitrePresentation'], \PDO::PARAM_STR);
        $prep->bindValue(':ContenuPresentation', $postClean['ContenuPresentation'], \PDO::PARAM_STR);
        $prep->execute();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 10/04/17
 * Time: 19:36
 */

namespace wcs\model;


class RealisationManager extends DbManager
{
    public function getReal()
    {
        return $this->findAll('realisation');
    }

    public function update($id)
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $val) {
                $postClean[$key] = trim($val);
            }
        }

        $query = "UPDATE realisation SET titre=:titre, contenu=:contenu, activation=:activation WHERE id=:id";
        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':id', $postClean['id'], \PDO::PARAM_INT);
        $prep->bindValue(':titre', $postClean['titre'], \PDO::PARAM_STR);
        $prep->bindValue(':contenu', $postClean['contenu'], \PDO::PARAM_STR);
        if (isset($_POST['activation'])) {
            $prep->bindValue(':activation', 1, \PDO::PARAM_INT);
        } else {
            $prep->bindValue(':activation', 0, \PDO::PARAM_INT);
        }
        $prep->execute();
    }
}
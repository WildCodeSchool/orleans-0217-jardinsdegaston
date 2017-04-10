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

    public function update()
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $val) {
                $postClean[$key] = htmlentities(trim($val));
            }
        }

        $query = "UPDATE realisation SET titre=:titre, contenu=:contenu, id_img_av=:id_img_av, id_img_ap=:id_img_ap WHERE id=:id";
        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
        $prep->bindValue(':titre', $postClean['titre'], \PDO::PARAM_STR);
        $prep->bindValue(':contenu', $postClean['contenu'], \PDO::PARAM_STR);
        $prep->bindValue(':id_img_av', $postClean['id_img_av'], \PDO::PARAM_STR);
        $prep->bindValue(':id_img_ap', $postClean['id_img_ap'], \PDO::PARAM_STR);
        $prep->execute();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 08:45
 */

namespace wcs\model;


class Realisation extends DB
{

    /* --- Proprietes ----------------------------- */

    /**
     * @var int
     */
    private $idImgAv;

    /**
     * @var int
     */
    private $idImgAp;


    /* --- Geters et setters ---------------------- */

    /**
     * @return int
     */
    public function getIdImgAv()
    {
        return $this->idImgAv;
    }

    /**
     * @param int $idImgAv
     * @return Realisation
     */
    public function setIdImgAv(int $idImgAv) : Realisation
    {
        $this->idImgAv = $idImgAv;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdImgAp() : int
    {
        return $this->idImg_ap;
    }

    /**
     * @param int $idImgAp
     * @return Realisation
     */
    public function setIdImgAp(int $idImgAp) : Realisation
    {
        $this->idImgAp = $idImgAp;
        return $this;
    }

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
        $pdo = new DB();
        $query = "UPDATE realisation SET titre=:titre, contenu=:contenu, id_img_av=:id_img_av, id_img_ap=:id_img_ap WHERE id=:id";
        $prep = $pdo->db->prepare($query);
        $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
        $prep->bindValue(':titre', $postClean['titre'], \PDO::PARAM_STR);
        $prep->bindValue(':contenu', $postClean['contenu'], \PDO::PARAM_STR);
        $prep->bindValue(':id_img_av', $postClean['id_img_av'], \PDO::PARAM_STR);
        $prep->bindValue(':id_img_ap', $postClean['id_img_ap'], \PDO::PARAM_STR);
        $prep->execute();
    }

}
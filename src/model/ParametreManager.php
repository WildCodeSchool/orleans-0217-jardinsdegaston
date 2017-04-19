<?php
// --- src/model/ParametreManager.php ---

namespace wcs\model;


use wcs\model\DbManager;
use wcs\model\Parametre;

class ParametreManager extends DbManager
{

    public function read()
    {
        return $this->findOne(1);
    }

    public Function writeOne($champ, $valeur)
    {
        $sql = "UPDATE parametre SET :champ=:valeur WHERE id=1";
        $pre = $this->getbdd()->prepare($sql);
        $pre->bindValue(':champ', $champ, \PDO::PARAM_STR);
        $pre->bindValue(':valeur', $valeur);
        $pre->execute();
        return $this->read();
    }

}
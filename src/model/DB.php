<?php
// --- src/model/Bgimage.php ---

namespace wcs\model;

/**
 * Class DB permettant de se connecter à une base de données et d'effectuer des requetes basiques
 * @package wcs
 */
class DB
{

    /**
     * @var \PDO
     */
    private $db;


    /**
     * requete permettant de récupérer tous les enregistrement de la table $table et d'instancier
     * un objet \model\$table
     * @param $table
     * @return array
     */
    public function findAll($db, $table, $opt=null) {
        $req = "SELECT * FROM $table";
        if ( null !== $opt ) {
            $req .= " ".$opt;
        }
        $res = $db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, '\wcs\model\\'.ucfirst($table));
    }

    /**
     *requete permettant de récupérer un enregistrement de la table $table et d'instancier
     * un objet \model\$table
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOne($db, $table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, '\wcs\model\\'.ucfirst($table));
        return $res[0];
    }
}
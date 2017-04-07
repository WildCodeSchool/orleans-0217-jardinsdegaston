<?php


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
    protected $db;

    /**
     * DB constructor.
     */
    public function __construct()
    {
        // on instancie un objet PDO
//        $this->db = new \PDO(DSN, USER, PASS);
        $this->db = new \PDO(DSN, USER, PASS);
        $this->db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        $this->db->exec("set names utf8");
    }

    /**
     * requete permettant de récupérer tous les enregistrement de la table $table et d'instancier
     * un objet \model\$table
     * @param $table
     * @return array
     */
    public function findAll($table, $opt=null) {
        $req = "SELECT * FROM $table";
        if ( null !== $opt ) {
            $req .= " ".$opt;
        }
        $res = $this->db->query($req);
        return $res->fetchAll(\PDO::FETCH_CLASS, '\wcs\model\\'.ucfirst($table));
    }

    /**
     *requete permettant de récupérer un enregistrement de la table $table et d'instancier
     * un objet \model\$table
     * @param $table
     * @param $id
     * @return mixed
     */
    public function findOne($table, $id) {
        $req = "SELECT * FROM $table WHERE id=:id";
        $prep = $this->db->prepare($req);
        $prep->bindValue(':id', $id, \PDO::PARAM_INT);

        $prep->execute();

        $res = $prep->fetchAll(\PDO::FETCH_CLASS, '\wcs\model\\'.ucfirst($table));
        return $res[0];
    }
}
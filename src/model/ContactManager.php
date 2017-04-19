<?php
/**
 * Created by PhpStorm.
 * User: jeremie
 * Date: 11/04/17
 * Time: 18:07
 */

namespace wcs\model;


class ContactManager extends DbManager
{
    public function addContact()
    {
        $query = "INSERT INTO contact (nom, prenom, email, contenu, telephone, date, statut) VALUES (:Nom, :Prenom, :Email, :Contenu, :Telephone, :Date, :Statut)";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':Nom', $_POST['NomContact'], \PDO::PARAM_STR);
        $prep->bindValue(':Prenom', $_POST['PrenomContact'], \PDO::PARAM_STR);
        $prep->bindValue(':Email', $_POST['EmailContact'], \PDO::PARAM_STR);
        $prep->bindValue(':Contenu', $_POST['TexteContact'], \PDO::PARAM_STR);
        $prep->bindValue(':Telephone', $_POST['TelContact'], \PDO::PARAM_STR);
        $prep->bindValue(':Date', date('Y-m-d H-i-s'));
        $prep->bindValue(':Statut', 0);
        $prep->execute();
    }
}
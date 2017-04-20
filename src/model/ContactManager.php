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
        $nom = $_POST['NomContact'];
        $prenom = $_POST['PrenomContact'];
        $email = $_POST['EmailContact'];
        $texte = $_POST['TexteContact'];
        $tel = $_POST['TelContact'];
        $date = date('Y-m-d H-i-s');
        $statut = '0';


        $query = "INSERT INTO contact (nom, prenom, email, contenu, telephone, date, statut) VALUES (:Nom, :Prenom, :Email, :Contenu, :Telephone, :Date, :Statut)";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':Nom', $nom);
        $prep->bindValue(':Prenom', $prenom);
        $prep->bindValue(':Email', $email);
        $prep->bindValue(':Contenu', $texte);
        $prep->bindValue(':Telephone', $tel);
        $prep->bindValue(':Date', $date);
        $prep->bindValue(':Statut', $statut);
        $res = $prep->execute();
        return $res;
    }

    public function updateLus($data)
    {
        $id = $data['id'];
        $statut = $data['StatutContact'];

        $query = "UPDATE contact SET statut=:Statut WHERE id=:id";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue('id', $id);
        $prep->bindValue('Statut', $statut);
        $prep->execute();

    }
}
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
    /*
     * Méthode pour ajouter un nouveau contact dans la BDD
     */
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

    /*
     * Méthode mettre à jour le contact en statut 1 "Lus"
     */
    public function contactLus($data)
    {
        $id = $data['id'];
        $statut = '1';

        $query = "UPDATE contact SET statut=:Statut WHERE id=:id";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue('id', $id);
        $prep->bindValue('Statut', $statut);
        $prep->execute();

    }

    /*
     * Méthode mettre à jour le contact en statut 2 "Archiver"
     */
    public function contactArchive($data)
    {
        $id = $data['id'];
        $statut = '2';

        $query = "UPDATE contact SET statut=:Statut WHERE id=:id";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue('id', $id);
        $prep->bindValue('Statut', $statut);
        $prep->execute();

    }

    /*
     * Méthode mettre à jour le contact en statut 3 "Supprimer"
     */
    public function contactDelete($data)
    {
        $id = $data['id'];
        $statut = '3';

        $query = "UPDATE contact SET statut=:Statut WHERE id=:id";

        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue('id', $id);
        $prep->bindValue('Statut', $statut);
        $prep->execute();

    }
}
<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 07/04/17
 * Time: 17:26
 */

namespace wcs\model;


class JournalManager extends DbManager
{
    public function getArticleByName($name)
    {

    }

    public function addOrUpdateArticle(Journal $article) : int
    {
        $id = $article->getId();

        if ( $id == 0 ) {
            var_dump($article);
            // --- creation d'un nouvel enregistrement
            $query = "INSERT into journal (titre, contenu, date) VALUES (:titre, :contenu, :date)";
            $pre = $this->getbdd()->prepare($query);
            $pre->bindValue(':titre', $article->getTitre(), \PDO::PARAM_STR);
            $pre->bindValue(':contenu', $article->getContenu(), \PDO::PARAM_STR);
            $pre->bindValue(':date', $article->getDate()->format('Y-m-d'));
        }
        else {
            // --- il s'agit d'une mise a jour
            $query = "UPDATE prestation SET titre=:titre, contenu=:contenu, date=:date WHERE id=$id";
            $pre = $this->getbdd()->prepare($query);
            $pre->bindValue(':titre', $article->getTitre(), \PDO::PARAM_STR);
            $pre->bindValue(':contenu', $article->getContenu(), \PDO::PARAM_STR);
            $pre->bindValue(':date', $article->getDate());
        }
        $pre->execute();
        if ( $id == 0 ) {
            $id = $this->getBdd()->lastInsertId();
        }
        return $id;
    }


}
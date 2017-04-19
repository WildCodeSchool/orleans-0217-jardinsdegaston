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

    public function addArticle(Journal $article)
    {
        $query = "INSERT into journal (titre, contenu, date) VALUES (:titre, :contenu, :date)";
        $pre = $this->getbdd()->prepare($query);
        $pre->bindValue(':titre', $article->getTitre());
        $pre->bindValue(':contenu', $article->getContenu());
        $pre->bindValue(':date', $article->getDate()->format('Y-m-d H:i:s'));

        $pre->execute();

        $id = $this->getBdd()->lastInsertId();

        return $id;
    }

    public function updateArticle(Journal $article)
    {
        $id = $article->getId();

        $query = "UPDATE journal SET titre=:titre, contenu=:contenu, date=:date WHERE id=$id";
        $pre = $this->getbdd()->prepare($query);
        $pre->bindValue(':titre', $article->getTitre());
        $pre->bindValue(':contenu', $article->getContenu());
        $pre->bindValue(':date', $article->getDate()->format('Y-m-d H:i:s'));

        $pre->execute();
    }
}
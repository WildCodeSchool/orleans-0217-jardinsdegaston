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

    public function writeArticle(Journal $article)
    {
        foreach ($_POST as $key => $val) {
            $postClean[$key] = htmlentities(trim($val));
        }

        $query = 'INSERT into journal (titre, contenu, date) VALUES (:titre, :contenu, :date)';
        $pre = $this->getbdd()->prepare($query);

        $pre->bindValue(':titre', $article->getTitre(), \PDO::PARAM_STR);
        $pre->bindValue(':contenu', $article->getContenu(), \PDO::PARAM_STR);
        $pre->bindValue(':date', $article->getDate(), \DateTime::ATOM);

        $pre->execute();

        $id = $this->getBdd()->lastInsertId();

        return $id;

        }

    public function modifyArticle(Journal $enr)
    {
        foreach ($_POST as $key => $val) {
            $postClean[$key] = htmlentities(trim($val));
        }

        $id = $enr->getId();

        $sql = 'UPDATE prestation SET titre=:titre, contenu=:contenu, date=:date WHERE id=$id';
        $pre = $this->getbdd()->prepare($sql);
        $pre->bindValue(':titre', $enr->getTitre(), \PDO::PARAM_STR);
        $pre->bindValue(':contenu', $enr->getContenu(), \PDO::PARAM_STR);
        $pre->bindValue(':date', $enr->getDate(), \PDO::PARAM_STR);

        $pre->execute();

        return $id;
    }
}
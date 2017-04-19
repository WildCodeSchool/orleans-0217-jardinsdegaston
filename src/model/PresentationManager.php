<?php
// --- src/model/PresentationManager.php ---


namespace wcs\model;

class PresentationManager extends DbManager
{

    public function update(Presentation $presentation)
    {
        $query = "UPDATE presentation SET titre=:titre, contenu=:contenu WHERE id=:id";
        $prep = $this->getBdd()->prepare($query);
        $prep->bindValue(':id', $presentation->getId(), \PDO::PARAM_INT);
        $prep->bindValue(':titre', $presentation->getTitre(), \PDO::PARAM_STR);
        $prep->bindValue(':contenu', $presentation->getContenu(), \PDO::PARAM_STR);
        $prep->execute();
    }
}
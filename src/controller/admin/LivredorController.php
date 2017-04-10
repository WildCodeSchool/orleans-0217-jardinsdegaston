<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:06
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;
use \wcs\model\Livredor;
use wcs\form\LivredorForm;
use wcs\model\DB;


class LivredorController extends Controller
{

    public function index()
    {

        $form = new LivredorForm();
        $Ldor = new Livredor();
        $param = ["content" => $Ldor->getLdor(),
            'form' => $form];

        return $this->twig->render('Livredor.twig', $param);
    }

    public function addLdor()
    {
        if (isset($_POST)) {
            foreach ($_POST as $key => $val) {
                $postClean[$key] = htmlentities(trim($val));
            }
        }
        $pdo = new DB();

        if (!empty($_POST['id'])) {
            $query = "UPDATE livredor SET nom=:NomLDor, contenu=:TexteLDor WHERE id=:id";
            $prep = $pdo->db->prepare($query);
            $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
            $prep->bindValue(':NomLDor', $postClean['NomLDor'], \PDO::PARAM_STR);
            $prep->bindValue(':TexteLDor', $postClean['TexteLDor'], \PDO::PARAM_STR);
            $prep->execute();
            return $this->index();
        }

        $query = "INSERT INTO livredor (nom, contenu) VALUES (:NomLDor, :TexteLDor)";

        $prep = $pdo->db->prepare($query);
        $prep->bindValue(':NomLDor', $postClean['NomLDor'], \PDO::PARAM_STR);
        $prep->bindValue(':TexteLDor', $postClean['TexteLDor'], \PDO::PARAM_STR);
        $prep->execute();

        return $this->index();
    }

    public function deleteLdor()
    {

        if (isset($_POST['id'])) {

            $pdo = new DB();
            $query = "DELETE FROM livredor WHERE id=:id" ;
            $prep = $pdo->db->prepare($query);
            $prep->bindValue(':id', $_POST['id'], \PDO::PARAM_INT);
            $prep->execute();
        }
        return $this->index();
    }

    public function updateLdor()
    {
        if (isset($_POST['id'])) {


            $form = new LivredorForm();
            $Ldor = new Livredor();
            $param = ["content" => $Ldor->getLdor(),
                'form' => $form,
                'value' => $Ldor->findOne('livredor', $_POST['id'])];
            return $this->twig->render('Livredor.twig', $param);
        }

    }
}
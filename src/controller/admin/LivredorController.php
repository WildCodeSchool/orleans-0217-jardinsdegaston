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
use wcs\Form\LivredorForm;
use wcs\model\DB;


class LivredorController extends Controller
{
    public function index()
    {
        // --- provisoire ---
//        $test = [   '0' =>
//            [   'Nom' => 'Mr.pouet',
//                'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
//            '1' =>
//                [   'Nom' => 'Mme.pouet',
//                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
//            '2' =>
//                [   'Nom' => 'Mr.pouet',
//                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
//            '3' =>
//                [   'Nom' => 'Mme.pouet',
//                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
//            '4' =>
//                [   'Nom' => 'Mr.pouet',
//                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor'],
//            '5' =>
//                [   'Nom' => 'Mr.pouet',
//                    'Texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor']
//        ];

        $form = new LivredorForm();
        $Ldor = new Livredor();
        $param = ["content" => $Ldor->getLdor(),
                   'form'=>$form];

        return $this->twig->render('Livredor.twig', $param);
    }

    public function addLdor()
    {
//        if (isset($_POST)) {
//            foreach ($_POST as $key => $val) {
//                $postClean[$key] = htmlentities(trim($val));
//            }
//        }
        if (isset($post)) {
            $db = new DB();
            $query = "INSERT INTO livredor (nom, contenu) VALUES (:NomLDor, :TexteLDor)";
            $prep = $db->prepare($query);
            $prep->bindValue(':NomLDor', $post['NomLDor'], \PDO::PARAM_STR);
            $prep->bindValue(':TexteLDor', $post['TexteLDor'], \PDO::PARAM_STR);
            $prep->execute();
            }
        return $this->index();
    }
}
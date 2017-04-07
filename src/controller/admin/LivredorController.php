<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:06
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;
use wcs\Form\LivredorFilter;
use \wcs\model\Livredor;
use wcs\Form\LivredorForm;



class LivredorController extends Controller
{

    public function index()
    {

        $form = new LivredorForm();
        $filter = new LivredorFilter();
        $form->setInputFilter($filter);
        $Ldor = new Livredor();
        $param = ["content" => $Ldor->getLdor(),
            'form' => $form];

        return $this->twig->render('Livredor.twig', $param);
    }

    public function addLdor()
    {

        $add = new Livredor();
        $add->addorUpdate();
        return $this->index();
    }

    public function deleteLdor()
    {
        $del = new Livredor();
        $del->delete();
        return $this->index();
    }

    public function updateLdor()
    {
        if (isset($_POST['id'])) {
            $form = new LivredorForm();
            $filter = new LivredorFilter();
            $form->setInputFilter($filter);

            $Ldor = new Livredor();
            $param = ["content" => $Ldor->getLdor(),
                'form' => $form,
                'value' => $Ldor->findOne('livredor', $_POST['id'])];
            return $this->twig->render('Livredor.twig', $param);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:06
 */

namespace wcs\controller\admin;
use wcs\controller\Controller;
use wcs\form\LivredorFilter;
use \wcs\model\Livredor;
use \wcs\model\LivredorManager;
use wcs\form\LivredorForm;


class LivredorController extends Controller
{

    public function index()
    {
        $manager = new LivredorManager($this->bdd, Livredor::class);
        $form = new LivredorForm();
        $filter = new LivredorFilter();
        $form->setInputFilter($filter);
        $param = ["content" => $manager->getLdor(),
            'form' => $form];

        return $this->twig->render('livredor/Livredor.twig', $param);
    }

    public function addLdor()
    {

        $manager = new LivredorManager($this->bdd, Livredor::class);
        $manager->addorUpdate();
        return $this->index();
    }

    public function deleteLdor()
    {
        $manager = new LivredorManager($this->bdd, Livredor::class);
        $manager->delete();
        return $this->index();
    }

    public function updateLdor()
    {
        if (isset($_POST['id'])) {
            $form = new LivredorForm();
            $filter = new LivredorFilter();
            $form->setInputFilter($filter);

            $manager = new LivredorManager($this->bdd, Livredor::class);
            $param = ["content" => $manager->getLdor(),
                'form' => $form,
                'value' => $manager->findOne($_POST['id'])];

            return $this->twig->render('livredor/Livredor.twig', $param);
        }
    }
}
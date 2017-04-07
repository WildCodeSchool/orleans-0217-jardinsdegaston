<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 01/04/17
 * Time: 21:07
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use wcs\Form\RealisationForm;
use wcs\model\Realisation;


class RealisationController extends Controller
{


    public function index()
    {

        $form = new RealisationForm();
        $Real = new Realisation();
        $param = ["content" => $Real->getReal(),
            'form' => $form];

        return $this->twig->render('Realisation.twig', $param);
    }

    public function updateReal()
    {
        $upd = new Realisation();
        $upd->update();
        return $this->index();

    }


}
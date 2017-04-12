<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 01/04/17
 * Time: 21:07
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use wcs\form\RealisationForm;
use wcs\model\Realisation;
use wcs\model\RealisationManager;



class RealisationController extends Controller
{


    public function index()
    {
        $manager = new RealisationManager($this->bdd, Realisation::class);
        $form = new RealisationForm();

        $param = ["content" => $manager->getReal(),
            'form' => $form];

        return $this->twig->render('realisation/Realisation.twig', $param);
    }

    public function updateReal()
    {
        $manager = new RealisationManager($this->bdd, Realisation::class);
        $manager->update();
        return $this->index();

    }


}
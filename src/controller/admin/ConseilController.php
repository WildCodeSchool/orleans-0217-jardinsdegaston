<?php
/**
 * Created by PhpStorm.
 * User: wilder10
 * Date: 02/04/17
 * Time: 08:06
 */

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use wcs\model\Conseil;
use wcs\model\ConseilManager;
use wcs\form\ConseilForm;
use wcs\form\ConseilFilter;


class ConseilController extends Controller
{

    public function index()
    {
        $manager = new ConseilManager($this->bdd, Conseil::class);
        $form = new ConseilForm();
        $filter = new ConseilFilter();
        $form->setInputFilter($filter);
        $params = ["conseils" => $manager->findAll('conseil'),
                    'form' => $form];

        return $this->twig->render('conseil/Conseil.twig', $params);
    }

    public function affichageConditionnelConseil()
    {
        $manager = new ConseilManager($this->bdd, Conseil::class);

        if (isset($_POST['actualiserAffichage'])) {
            foreach ($_POST['saison'] as $value)
            {
                $conseils = $manager->findBySeason($value);
            }
        }

        $form = new ConseilForm();
        $filter = new ConseilFilter();
        $form->setInputFilter($filter);
        $params = ["conseils" => $conseils,
                    'form' => $form];

        return $this->twig->render('conseil/Conseil.twig', $params);

    }

}

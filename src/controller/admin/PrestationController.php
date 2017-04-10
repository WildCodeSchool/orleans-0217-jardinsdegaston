<?php
// --- src/controller/admin/PrestationController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use wcs\model\DbManager;
use \wcs\model\Prestation;
use wcs\model\PrestationManager;

/**
 * Class PrestationController
 * page d'admin des prestations (visu, ajout, modif supp)
 * @package wcs\controller\admin
 */
class PrestationController extends Controller
{

    /** **********************************************************
     * premier acces a la page
     * @return mixed
     */
    public function index()
    {
        $manager = new DbManager($this->bdd, Prestation::class);
        $params = [
            'prestations' => $manager->findAll('ORDER BY ordreaff'),
            'formimage' => $this->img->getTmpName('P'),
        ];
        return $this->twig->render('Prestation.twig', $params);
    }




}
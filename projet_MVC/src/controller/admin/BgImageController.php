<?php
// --- src/controller/admin/BgImageController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;
use \wcs\model\Bgimage;

/**
 * Class BgImageController
 * Controlleur permettant la gestion des images de fond
 * @package wcs\adm\controller
 */
class BgImageController extends Controller
{

    public function index()
    {
        $bgimg = new Bgimage;
        $param = [
            'saisons' => ['Printemps', 'Eté', 'Automne', 'Hiver'],
            'bgimg1' => $bgimg->getImgP(),
            'bgimg2' => $bgimg->getImgS(),
            'galerie' => $bgimg->getImg(),
        ];
        return $this->twig->render('BgImage.twig',$param);
    }




}
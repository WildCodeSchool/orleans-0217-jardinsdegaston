<?php
// --- src/controller/admin/BgImageController.php ---

namespace wcs\controller\admin;
use \wcs\controller\Controller;

/**
 * Class BgImageController
 * Controlleur permettant la gestion des images de fond
 * @package wcs\adm\controller
 */
class BgImageController extends Controller
{
    private $saisons = ['Printemps', 'Eté', 'Automne', 'Hiver'];

    public function index()
    {
        $this->img->resetTmp('background');
        return $this->twig->render('BgImage.twig', ['saisons' => $this->saisons]);
    }

    public function imgupload()
    {
        $this->img->recupImg('background');
        return $this->twig->render('BgImage.twig', ['saisons' => $this->saisons]);
    }

    public function imgswitch()
    {
        die('switch');
    }
}
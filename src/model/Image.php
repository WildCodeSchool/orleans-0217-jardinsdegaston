<?php
// --- src/models/Image.php ---

namespace wcs\model;

use PHPThumb;

class Image
{
    // --- repertoire temporaire pour twig et images uploadees
    const TMPDIR = '../tmp/';
    // --- repertoire de stockage des images
    const IMGDIR = '../img/';

    /* --- Proprietes ------------------------------------------- */
    /**
     * infos images en fonction du type
     * @var array
     */
    private $imgTypes = [
        'B' => ['type' => 'Background', 'larg' => 1920, 'haut' => 1200],
        'P' => ['type' => 'Prestations', 'larg' => 400, 'haut' => 400],
        'Rav' => ['type' => 'Réalisations', 'larg' => 750, 'haut' => 400],
        'Rap' => ['type' => 'Réalisations', 'larg' => 750, 'haut' => 400],
        'J' => ['type' => 'Journal', 'larg' => 600, 'haut' => 400],
    ];


    /* --- Geters et setters ------------------------------------- */
    private function getLargImg($codetype) : int
    {
        return $this->imgTypes[$codetype]['larg'];
    }
    private function getHautImg($codetype) : int
    {
        return $this->imgTypes[$codetype]['haut'];
    }

    /**
     * **************************************************************
     * retablit tous les droits sur le fichier image temporaire
     * @param $codetype
     */
    private function rwx($codetype)
    {
        chmod(self::TMPDIR.'img'.$codetype.'-tmp.jpg', 0777);
    }

    /**
     * **************************************************************
     * Controle si fichier image temporaire existe (dans tmp)
     * @param $codetype
     * @return bool
     */
    public function tmpImgExists($codetype) {
        return file_exists(self::TMPDIR.'img'.$codetype.'-tmp.jpg');
    }

    /**
     * **************************************************************
     * Efface l'image temportaire
     * @param $codetype
     */
    public function resetTmp($codetype)
    {
        if ( $this->tmpImgExists($codetype) ) {
            unlink(self::TMPDIR.'img'.$codetype.'-tmp.jpg');
        }
    }

    /**
     * **************************************************************
     * retourne le chemin et nom de l'image temporaire a afficher
     * @param $codetype
     * @return string
     */
    public function getTmpName($codetype)
    {
        if ( $this->tmpImgExists($codetype) ) {
            return self::TMPDIR.'img'.$codetype.'-tmp.jpg';
        }
        else {
            return self::IMGDIR.'img'.$codetype.'-ref.jpg';
        }
    }

    /**
     * **************************************************************
     * retourne le chemin et nom de l'image vide
     * @param $codetype
     * @return string
     */
    public function getImageVide($codetype)
    {
        return self::IMGDIR.'img'.$codetype.'-ref.jpg';
    }


    /**
     * utilise la bibliotheque masterexploder/PHPThumb (installee via composer)
     * @param $codetype
     */
    public function resize($codetype)
    {
         --- creation de l'objet a manipuler
        $imgrsz = new PHPThumb\GD($tmpName);
        // --- resize de l'objet
        $imgrsz->adaptiveResize($this->getLargImg($codetype), $this->getHautImg($codetype));
//        $imgrsz->resize($this->getLargImg($codetype), $this->getHautImg($codetype));
        // --- effacement du fichier temporaire initial
        $this->resetTmp($codetype);
        // --- ecriture du fichier temporaire redimensionne
        $imgrsz->save($tmpName);
        $this->rwx($codetype);
    }

    /**
     * **************************************************************
     * rapatrie l'image uploadee vers le tmp et la renomme en xxx-tmp.jpg
     * @param $codetype
     */
    public function recupImg($codetype)
    {
        // --- suppression eventuel fichier temporaire residuel
        $this->resetTmp($codetype);
        // --- ajout suffixe 'av' ou 'ap' au nom de fichier pour les images realisation
        $fileName='fichier';
        if (strlen($codetype)>1){
            $fileName.=substr($codetype,1);
        }
        // --- deplacement fichier de la zone d'upload vers tmp
        if ( false === move_uploaded_file($_FILES[$fileName]['tmp_name'], self::TMPDIR.'img'.$codetype.'-tmp.jpg') ) {
            $this->resetTmp($codetype);

            //voir aussi $_FILES['fichier']['error'] > 0 (il y a eu une erreur)
            //           $_FILES['fichier']['size'] > maxsize (fichier trop gros)


            // --- erreur upload foireux ---

            return false;

        }
        // --- A VIRER SUR SITE FINAL : reaffecte droits sur fichier image déplacé.
        $this->rwx($codetype);
        // resize image en fonction des besoins
        $this->resize($codetype);
    }

    /**
     * **************************************************************
     * Deplace l'image temporaire vers son emplacement de production (et la renomme)
     * @param $codetype
     * @param $identif
     */
    public function deplace($codetype, $identif)
    {
        if ( $this->tmpImgExists($codetype) ) {
            switch ( $codetype ) {
                case 'B' :
                case 'P' :
                case 'Rap':
                case 'Rav':
                    $urldest = self::IMGDIR.'img'.$codetype.'-'.$identif.'.jpg';
                    if ( file_exists($urldest) ) {
                        // --- on supprime l'ancienne image
                        unlink($urldest);
                    }
                    if ( false === rename(self::TMPDIR . 'img'.$codetype.'-tmp.jpg', $urldest) ) {

                        die('PAS GLOP');
                        // --- erreur deplacement infructueux

                    }
                    break;
// ********* A VALIDER *************************
//                default :
//                    if ( false === rename(self::TMPDIR . 'img'.$codetype.'-tmp.jpg', self::IMGDIR.'img'.$codetype.'-'.$this->numsaisons[$codesaison].'.jpg') ) {
//
//                        die('PAS GLOP');
//                        // --- erreur deplacement infructueux
//
//                    }
// **********************************************
            }
        }
    }

    /**
     * **************************************************************
     * Efface l'image de son emplacement de production
     * @param $codetype
     * @param $identif
     */
    public function delImg($codetype, $identif)
    {
        $urldest = self::IMGDIR.'img'.$codetype.'-'.$identif.'.jpg';
        if ( file_exists($urldest) ) {
            // --- on supprime l'image
            unlink($urldest);
        }
    }


}
<?php
// --- src/models/Image.php ---

namespace wcs\model;


class Image
{
    /* --- Proprietes ------------------------------------------- */

    const TMPDIR = '../../tmp/';
    const IMGDIR = '../../web/img/';
    private $imgTypes = [
        'B' => ['type' => 'Background', 'larg' => 1920, 'haut' => 1200],
        'P' => ['type' => 'Prestations', 'larg' => 400, 'haut' => 400],
        'Rav' => ['type' => 'Réalisations', 'larg' => 750, 'haut' => 400],
        'Rap' => ['type' => 'Réalisations', 'larg' => 750, 'haut' => 400],
        'J' => ['type' => 'Journal', 'larg' => 750, 'haut' => 400],
    ];
    /**
     * convertion code saison (Printemps, Eté, Automne, Hiver) en numéro associé
     * @var array
     */
    private $numsaisons = ['P' => 1, 'E' => 2, 'A' => 3, 'H' => 4,];



    /* --- Geters et setters ------------------------------------- */

    /**
     * **************************************************************
     * retablit tous les droits sur le fichier image temporaire
     * @param $codetype
     */
    private function rwx($codetype)
    {
        chmod(self::TMPDIR.'img'.$codetype.'-tmp.jpg', 0777);
    }
//
//    /**
//     * Supprime le fichier image temporaire
//     * @param $codetype
//     */
//    private function reset($codetype)
//    {
//        copy(self::IMGDIR.'img'.$codetype.'-ref.jpg', self::TMPDIR.'img'.$codetype.'-tmp.jpg');
//    }

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

//    public function resize($codetype)
//    {
//
//    }

    /**
     * **************************************************************
     * rapatrie l'image uploadee vers le tmp et la renomme en xxx-tmp.jpg
     * @param $codetype
     */
    public function recupImg($codetype)
    {
        $this->resetTmp($codetype);
        if ( false === move_uploaded_file($_FILES['fichier']['tmp_name'], self::TMPDIR.'img'.$codetype.'-tmp.jpg') ) {
            $this->reset($codetype);

            //voir aussi $_FILES['fichier']['error'] > 0 (il y a eu une erreur)
            //           $_FILES['fichier']['size'] > maxsize (fichier trop gros)


            // --- erreur upload foireux ---

            return false;

        }
        $this->rwx($codetype);
        // **** PENSER A ACTIVER LA LIGNE CI-DESSOUS (et implementer la fonction) ***********
        // $this->resize($codetype);
    }

    /**
     * **************************************************************
     * Deplace l'image temporaire vers son emplacement de production (et la renomme)
     * @param $codetype
     * @param $codesaison
     */
    public function deplace($codetype, $codesaison)
    {
        if ( $this->tmpImgExists($codetype) ) {
            switch ( $codetype ) {
                case 'B' :
                    if ( false === rename(self::TMPDIR . 'imgB-tmp.jpg', self::IMGDIR.'imgB-'.$this->numsaisons[$codesaison].'.jpg') ) {

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

}
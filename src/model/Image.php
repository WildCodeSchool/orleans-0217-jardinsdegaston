<?php

namespace wcs\model;


class Image
{

    const TMPDIR = '../../tmp/';
    const IMGDIR = '../../web/img/';
    private $imgTypes = [
        'B' => ['type' => 'Background', 'larg' => 1920, 'haut' => 1200],
        'P' => ['type' => 'Prestations', 'larg' => 400, 'haut' => 400],
        'R' => ['type' => 'Réalisations', 'larg' => 750, 'haut' => 400],
        'J' => ['type' => 'Journal', 'larg' => 750, 'haut' => 400],
    ];
    /**
     * convertion code saison (Printemps, Eté, Automne, Hiver) en numéro associé
     * @var array
     */
    private $numsaisons = ['P' => 1, 'E' => 2, 'A' => 3, 'H' => 4,];

    /**
     * Controle si fichier image temporaire existe
     * @param $codetype
     * @return bool
     */
    public function tmpImgExists($codetype) {
        return file_exists(self::TMPDIR.'img'.$codetype.'-tmp.jpg');
    }

    /**
     * Supprime fichier image temporaire
     * @param $codetype
     */
    private function clean($codetype)
    {
        if ( $this->tmpImgExists($codetype) ) {
            unlink(self::TMPDIR.'img'.$codetype.'-tmp.jpg');
        }
    }

    /**
     * retablit tous les droits sur le fichier image temporaire
     * @param $codetype
     */
    private function rwx($codetype)
    {
        chmod(self::TMPDIR.'img'.$codetype.'-tmp.jpg', 0777);
    }

    /**
     * Supprime le fichier image temporaire
     * @param $codetype
     */
    private function reset($codetype)
    {
        copy(self::IMGDIR.'img'.$codetype.'-ref.jpg', self::TMPDIR.'img'.$codetype.'-tmp.jpg');
    }


    public function resetTmp($codetype)
    {
        $this->clean($codetype);
    }
    public function getTmpName($codetype)
    {
        if ( $this->tmpImgExists($codetype) ) {
            return 'img'.$codetype.'-tmp';
        }
        else {
            return 'img'.$codetype.'-ref';
        }
    }
    public function resize($codetype)
    {

    }

    public function recupImg($codetype)
    {
        $this->clean($codetype);
        if ( false === move_uploaded_file($_FILES['fichier']['tmp_name'], self::TMPDIR.'img'.$codetype.'-tmp.jpg') ) {
            $this->reset($codetype);

            // --- erreur upload unfructueux ---

        }
        $this->rwx($codetype);
        // $this->resize($codetype);
    }

    public function deplace($codetype, $codesaison)
    {
//        die(self::TMPDIR . 'imgB-tmp.img --- '.self::IMGDIR.'imgB-'.$this->numsaisons[$codesaison].'.jpg');
        if ( $this->tmpImgExists($codetype) ) {
            switch ( $codetype ) {
                case 'B' :
                    if ( false === rename(self::TMPDIR . 'imgB-tmp.jpg', self::IMGDIR.'imgB-'.$this->numsaisons[$codesaison].'.jpg') ) {

                        die('PAS GLOP');
                        // --- erreur deplacement infructueux

                    }
                    break;
            }
        }
    }

}
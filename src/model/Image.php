<?php

namespace wcs\model;


class Image
{

    const TMPDIR = '../../tmp/';

    private function clean($filetype)
    {
        // --- suppression d'un eventuel fichier residuel
        if ( file_exists(self::TMPDIR.'img'.$filetype.'-tmp.jpg') ) {
            unlink(self::TMPDIR.'img'.$filetype.'-tmp.jpg');
        }
    }
    private function reset($filetype)
    {
        // --- restauration du fichier vide
        copy(self::TMPDIR.'img'.$filetype.'-ref.jpg', self::TMPDIR.'img'.$filetype.'-tmp.jpg');
    }
    private function rwx($filetype)
    {
        chmod(self::TMPDIR.'img'.$filetype.'-tmp.jpg', 0777);
    }


    public function resetTmp($typeimg)
    {
        switch ($typeimg) {
            case 'background' :
                $this->clean('B');
                $this->reset('B');
                $this->rwx('B');
                break;
        }
    }


    public function recupImg($typeimg)
    {
        switch ($typeimg) {
            case 'background' :
                $this->clean('B');
                if ( false === move_uploaded_file($_FILES['fichier']['tmp_name'], self::TMPDIR.'imgB-tmp.jpg') ) {

                    // --- erreur upload unfructueux ---

                    $this->reset('B');
                }
                $this->rwx('B');
                break;
        }
    }

}
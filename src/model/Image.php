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
    // --- taille max upload (20M)
    const MAXSIZE = 20000000;

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

    private $erreur = '';

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
     * @return string
     */
    public function getErreur(): string
    {
        return $this->erreur;
    }

    /**
     * @param string $erreur
     */
    private function setErreur(string $erreur)
    {
        $this->erreur = $erreur;
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
        $tmpName = $this->getTmpName($codetype);
        // --- creation de l'objet a manipuler
        $imgrsz = new PHPThumb\GD($tmpName);
        // --- resize de l'objet
        $imgrsz->adaptiveResize($this->getLargImg($codetype), $this->getHautImg($codetype));
        // --- effacement du fichier temporaire initial
        $this->resetTmp($codetype);
        // --- ecriture du fichier temporaire redimensionne
        $imgrsz->save($tmpName);
        $this->rwx($codetype);
    }

    /**
     * **************************************************************
     * rapatrie l'image uploadee vers le tmp et la renomme en xxx-tmp.jpg
     * C'est ici que le format de l'image est controle (jpeg uniquement)
     * retourne false si une erreur est generee (vrai sinon)
     * @param $codetype
     */
    public function recupImg($codetype)
    {
        // --- pour l'instant, tout va bien
        $this->setErreur('');
        // --- suppression eventuel fichier temporaire residuel
        $this->resetTmp($codetype);
        // --- ajout suffixe 'av' ou 'ap' au nom de fichier pour les images realisation
        $fileName='fichier';
        if (strlen($codetype)>1){
            $fileName.=substr($codetype,1);
        }
        // --- controle format image (doit etre du jpeg)
        $infos = getimagesize($_FILES[$fileName]['tmp_name']);
        if ( false === $infos ) {
            // --- format inconnu
            $this->setErreur('Mauvais format de fichier (format jpeg attendu). Upload abandonné.');
            return false;
        }
        elseif ( !array_key_exists('mime', $infos) || $infos['mime'] != 'image/jpeg' ) {
            // --- C'est pas du jpeg
            $this->setErreur('Mauvais format de fichier (format jpeg attendu). Upload abandonné.');
            return false;
        }
        else {
            // --- C'est bien le format attendu, deplacement fichier de la zone d'upload vers tmp
            if ( false === move_uploaded_file($_FILES[$fileName]['tmp_name'], self::TMPDIR.'img'.$codetype.'-tmp.jpg') ) {
                // --- l'operation n'a pas abouti
                $this->resetTmp($codetype);
                if ( $_FILES[$fileName]['size'] > self::MAXSIZE ) {
                    $this->setErreur('Fichier trop gros (taille max. 20Mo). Upload abandonné.');
                    return false;
                }
                else {
                    // --- erreur autre
                    if ( $_FILES[$fileName]['error'] > 0 ) {
                        $this->setErreur('Erreur inconnue lors de l\'upload. Opération abandonnée.');
                        return false;
                    }
                }
            }
            // --- A VIRER SUR SITE FINAL : reaffecte droits sur fichier image déplacé.
            $this->rwx($codetype);
            // resize image en fonction des besoins
            $this->resize($codetype);
            return true;
        }
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
                        $this->setErreur('Impossible de déplacer l\'image dans son emplacement définitif . Opération abandonnée .');
                        return false;
                    }
                    return true;
                    break;
            }
        }
        else {
            $this->setErreur('L\'image n\'a pas été importée correctement. Opération abandonnée.');
            return false;
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
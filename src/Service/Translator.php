<?php
namespace wcs\Service;
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 20/04/17
 * Time: 15:24
 */
class Translator implements TranslatorInterface
{
    /**
     * @var \Zend\I18n\Translator\Translator
     */
    public $zfTranslator;

    /**
     * Initialise le ZF Translator
     *
     * Translator constructor.
     */
    public function __construct()
    {
        $this->zfTranslator = new \Zend\I18n\Translator\Translator();
        $this->zfTranslator->addTranslationFile('phparray', PATH_FILE_ZF_VALIDATE);
        $this->zfTranslator->setLocale('fr_FR');
    }

    /**
     * Traduit les messages de validation en FR
     *
     * @param array $errMsg
     */
    public function translate(array &$errMsg)
    {
        foreach ($errMsg as &$msg) {
            $msg = $this->zfTranslator->translate($msg);
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: wilder3
 * Date: 06/04/17
 * Time: 20:07
 */

namespace wcs\form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Date;
use Zend\Form\Element\DateTime;
use Zend\Form\Element\File;
use Zend\Form\Element\Image;
use Zend\Form\Element\Text;
use Zend\Form\Form;

class ArticleForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type'  => Text::class,
            'name' => 'titre',
            'options' => [
                'label' => 'Titre de l\'article',
            ],
        ]);

        $this->add([
            'type'  => Text::class,
            'name' => 'date',
            'options' => [
                'label' => 'Date de publication',
            ],
        ]);

        $this->add([
            'type'  => Text::class,
            'name' => 'contenu',
            'options' => [
                'label' => 'Contenu de l\'article',
            ],
        ]);

        $this->add([
            'type' => File::class,
            'name' => 'imgArticle',
            'options' => [
                'label' => 'Image de l\'article',
            ]
        ]);

        $this->add([
            'type' => Csrf::class,
            'name' => 'csrf',
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: wilder3
 * Date: 06/04/17
 * Time: 20:07
 */

namespace wcs\form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\DateTime;
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
                'label' => 'Le nom de l\'article',
            ],
        ]);

        $this->add([
            'type'  => DateTime::class,
            'name' => 'date',
            'options' => [
                'label' => 'Date de parution',
            ],
        ]);

        $this->add([
            'type'  => Text::class,
            'name' => 'contenu',
            'options' => [
                'label' => 'Le contenu de l\'article',
            ],
        ]);

        $this->add([
            'type'  => Text::class,
            'name' => 'image',
            'options' => [
                'label' => 'Choisir une image',
            ],
        ]);
    }
}
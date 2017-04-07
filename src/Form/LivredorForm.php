<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 21:50
 */

namespace wcs\Form;

use Zend\Form\Element\Csrf;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class LivredorForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type'  => Text::class,
            'name' => 'NomLDor',
            'options' => [
                'label' => 'Nom',
            ],
        ]);

        $this->add([
            'type'  => Textarea::class,
            'name' => 'TexteLDor',
            'options' => [
                'label' => 'Texte',
            ],
        ]);

        $this->add([
            'type' => Csrf::class,
            'name' => 'csrf',
        ]);
    }
}
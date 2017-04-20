<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 21:50
 */

namespace wcs\form;

use Zend\Form\Element\Checkbox;
use Zend\Form\Element\Csrf;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class ConseilForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type'  => Text::class,
            'name' => 'contenu',
            'options' => [
                'label' => 'Contenu du conseil',
            ],
        ]);

        $this->add([
            'type'  => Checkbox::class,
            'name' => 'printemps',
            'options' => array(
                'checked_value' => 1,
                'unchecked_value' => 0,
            )
        ]);

        $this->add([
            'type'  => Checkbox::class,
            'name' => 'ete',
            'options' => array(
                'checked_value' => 1,
                'unchecked_value' => 0,
            )
        ]);

        $this->add([
            'type'  => Checkbox::class,
            'name' => 'automne',
            'options' => array(
                'checked_value' => 1,
                'unchecked_value' => 0,
            )
        ]);

        $this->add([
            'type'  => Checkbox::class,
            'name' => 'hiver',
            'options' => array(
                'checked_value' => 1,
                'unchecked_value' => 0,
            )
        ]);

        $this->add([
            'type' => Csrf::class,
            'name' => 'csrf',
        ]);
    }
}
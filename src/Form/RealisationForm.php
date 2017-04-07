<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/04/17
 * Time: 12:05
 */

namespace wcs\Form;


use Zend\Form\Element\File;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class RealisationForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type'  => Text::class,
            'name' => 'TitreReal',
            'options' => [
                'label' => 'Titre réalisation',
            ],
        ]);

        $this->add([
            'type'  => Textarea::class,
            'name' => 'TexteReal',
            'options' => [
                'label' => 'Texte réalisation',
            ],
        ]);

        $this->add([
            'type'  => File::class,
            'name' => 'img_av',
            'options' => [
                'label' => 'img_av',
            ],
        ]);

        $this->add([
            'type'  => File::class,
            'name' => 'img_ap',
            'options' => [
                'label' => 'img_ap',
            ],
        ]);


    }

}
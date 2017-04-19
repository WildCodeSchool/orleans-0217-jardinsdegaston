<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:41
 */

namespace wcs\Form;

use Zend\Form\Element\Tel;
use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class ContactForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type'  => Text::class,
            'name' => 'NomContact',
            'options' => [
                'label' => 'Nom',
            ],
        ]);

        $this->add([
            'type'  => Text::class,
            'name' => 'PrenomContact',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);

        $this->add([
            'type'  => Email::class,
            'name' => 'EmailContact',
            'options' => [
                'label' => 'Email',
            ],
        ]);

        $this->add([
            'type'  => Textarea::class,
            'name' => 'TexteContact',
            'options' => [
                'label' => 'Texte',
            ],
        ]);

        $this->add([
            'type'  => Tel::class,
            'name' => 'TelContact',
            'options' => [
                'label' => 'Téléphone',
            ],
        ]);
    }
}
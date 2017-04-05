<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/04/17
 * Time: 22:41
 */

namespace wcs\Form;


use Zend\Form\Element\Email;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

class MessageForm extends Form
{
    public function __construct($name = null, array $options = [])
    {
        parent::__construct($name, $options);

        $this->add([
            'type'  => Text::class,
            'name' => 'NomMessage',
            'options' => [
                'label' => 'Nom',
            ],
        ]);

        $this->add([
            'type'  => Text::class,
            'name' => 'PrenomMessage',
            'options' => [
                'label' => 'Prenom',
            ],
        ]);

        $this->add([
            'type'  => Email::class,
            'name' => 'EmailMessage',
            'options' => [
                'label' => 'Email',
            ],
        ]);

        $this->add([
            'type'  => Textarea::class,
            'name' => 'TexteLDor',
            'options' => [
                'label' => 'Texte',
            ],
        ]);
    }
}
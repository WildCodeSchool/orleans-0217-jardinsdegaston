<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/04/17
 * Time: 12:05
 */

namespace wcs\Form;


use Zend\InputFilter\InputFilter;

class RealisationFilter extends InputFilter
{
    public function __construct()
    {

        $this->add([
            'name' => 'TitreReal',
            'allow_empty' => false,
            'required' => true,
        ]);

        $this->add([
            'name' => 'TexteReal',
            'allow_empty' => false,
            'required' => true,
        ]);
    }
}
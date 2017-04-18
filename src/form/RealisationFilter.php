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
//        $this->add([
//            'name' => 'img_av',
//            'allow_empty' => false,
//            'required' => true,
//            'validators'    => array(
//                array('Count', false, 1),
//                array('Size', false, 20000000),
//                array('Extension', false, 'jpg,png')),
//            'destination'=> __DIR__ . '../tmp'
//        ]);
//
//        $this->add([
//            'name' => 'img_ap',
//            'allow_empty' => false,
//            'required' => true,
//            'validators'    => array(
//                array('Count', false, 1),
//                array('Size', false, 20000000),
//                array('Extension', false, 'jpg,png')),
//            'destination'=> __DIR__ . '../tmp'
//        ]);

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
<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/04/17
 * Time: 10:08
 */

namespace wcs\Form;


use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;


class LivredorFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'NomLDor',
            'allow_empty' => false,
            'required' => true,
//            'validators' => [
//                [
//                    'name' => StringTrim::class,
//                ],
//                [
//                    'name' => StripTags::class
//                ]]
        ]);

        $this->add([
            'name' => 'TexteLDor',
            'allow_empty' => false,
            'required' => true,
//            'validators' => [
//                [
//                    'name' => StringTrim::class
//                ],
//                [
//                    'name' => StripTags::class
//                ]]
            ]);
    }
}
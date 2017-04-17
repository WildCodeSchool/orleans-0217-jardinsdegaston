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
use Zend\Validator\NotEmpty;
use Zend\Validator\Date;


class ArticleFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'titre',
            'allow_empty' => false,
            'required' => true,
            'validators' => [
                [
                    'name' => NotEmpty::class,
                ],
                [
                    'name' => StringTrim::class,
                ],
                [
                    'name' => StripTags::class
                ]]
        ]);

        $this->add([
            'name' => 'date',
            'allow_empty' => false,
            'required' => true,
            'validators' => [
                [
                    'name' => NotEmpty::class,
                ],
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ],
                [
                    'name' => Date::class
                ]]
        ]);

        $this->add([
            'name' => 'contenu',
            'allow_empty' => false,
            'required' => true,
            'validators' => [
                [
                    'name' => NotEmpty::class,
                ],
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ]]
            ]);
    }
}
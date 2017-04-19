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
use Zend\Validator\File\Exists;
use Zend\Validator\File\Extension;
use Zend\Validator\File\IsImage;
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
            'filters' => [
                [
                    'name' => StringTrim::class,
                ],
                [
                    'name' => StripTags::class
                ]],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                ]]
        ]);

        $this->add([
            'name' => 'date',
            'allow_empty' => false,
            'required' => true,
            'filters' => [
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                ],
                [
                    'name' => Date::class,
                    'options' => [
                        'format' => "Y-m-d H:i:s",
                    ]
                ]],
        ]);

        $this->add([
            'name' => 'contenu',
            'allow_empty' => false,
            'required' => true,
            'filters' => [
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ],
            ],
            'validators' => [
                [
                    'name' => NotEmpty::class,
                ]],
            ]);

        $this->add([
            'name' => 'imgArticle',
            'allow_empty' => false,
            'required' => true,
            'validators' => [
                [
                    'name' => Extension::class,
                    'options' => [
                        'extension' => ['jpg', 'jpeg']
                    ]
                ],
            ],
        ]);
    }
}
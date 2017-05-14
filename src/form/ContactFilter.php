<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 04/04/17
 * Time: 10:49
 */

namespace wcs\Form;



use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Digits;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;


class ContactFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'NomContact',
            'allow_empty' => false,
            'required' => true,
            'filters' => [
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ]],
            'validators' => [
                [
                    'name' => NotEmpty::class
                ]]
        ]);

        $this->add([
            'name' => 'PrenomContact',
            'allow_empty' => false,
            'required' => true,
            'filters' => [
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ]],
            'validators' => [
                [
                    'name' => NotEmpty::class
                ]]
        ]);

        $this->add([
            'name' => 'EmailContact',
            'allow_empty' => false,
            'required' => false,
            'filters' => [
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ]],
            'validators' => [
                [
                    'name' => EmailAddress::class
                ]]
        ]);

        $this->add([
            'name' => 'TelContact',
            'allow_empty' => false,
            'required' => false,
            'filters' => [
                [
                    'name' => StringTrim::class
                ],
                [
                    'name' => StripTags::class
                ]],
            'validators' => [
                [
                    'name' => Digits::class
                ]]
        ]);

        $this->add([
            'name' => 'TexteContact',
            'allow_empty' => false,
            'required' => true,
            'filters' => [
                [
                    'name' => StripTags::class
                ]]
        ]);
    }
}
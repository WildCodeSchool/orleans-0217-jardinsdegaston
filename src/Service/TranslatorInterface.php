<?php
namespace wcs\Service;
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 20/04/17
 * Time: 15:24
 */
interface TranslatorInterface
{
    public function translate(array &$errMsg);
}

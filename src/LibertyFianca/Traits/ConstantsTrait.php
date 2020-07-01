<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Traits;

/**
 * Trait ConstantsTrait
 * @package MatheusHack\LibertyFianca\Traits
 */
trait ConstantsTrait
{
    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function getAll()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
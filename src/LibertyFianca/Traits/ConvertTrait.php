<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Traits;

/**
 * Trait ConvertTrait
 * @package MatheusHack\LibertyFianca\Traits
 */
trait ConvertTrait
{
    /**
     * @return array
     */
    public function toArray()
    {
        $array = (array) get_object_vars($this);
        return array_filter($array, function($item){
			return $item !== "" && $item !== 0 && $item !== null;
		});
    }
}
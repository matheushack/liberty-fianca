<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Entities;


use Valitron\Validator;

/**
 * Class ValidateResponse
 * @package MatheusHack\LibertyFianca\Entities
 */
class ValidateResponse
{
	public function error(Validator $validator)
	{
		array_map(function($items) use (&$errors){
			$errors .= implode(PHP_EOL, $items).PHP_EOL;
		}, $validator->errors());

		return (new Response)
			->setSuccess(false)
			->setMessage($errors);
	}
}
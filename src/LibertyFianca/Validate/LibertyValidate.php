<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 09/06/20
 * Time: 14:50
 */

namespace MatheusHack\LibertyFianca\Validate;


use Valitron\Validator;

class LibertyValidate extends Validator
{
	function __construct($data = array(), $fields = array(), $lang = null, $langDir = null)
	{
		$this->customRules();
		parent::__construct($data, $fields, $lang, $langDir);
	}

	public function customRules()
	{
		$this->addInstanceRule('base64', function($field, $value, $params = []){
			return !empty($value) && chunk_split(base64_encode(base64_decode($value, true))) === $value;
		}, 'deve ser em base64');
	}
}
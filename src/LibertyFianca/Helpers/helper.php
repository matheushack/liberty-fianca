<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 18/05/20
 * Time: 19:34
 */

if(!function_exists("data_get")){
	/**
	 * @param $field
	 * @param $matriz
	 * @param string $default
	 * @return mixed|string
	 */
	function data_get($field, $matriz, $default = ''){
		return array_key_exists($field, $matriz) ? $matriz[$field] : $default;
	}
}

if(!function_exists("filter_empty_array")) {
	/**
	 * @param array $array
	 * @return array
	 */
	function filter_empty_array(array $array)
	{
		$array = array_map(function ($item) {
			return is_array($item) ? filter_empty_array($item) : $item;
		}, $array);

		return array_filter($array, function ($item) {
			return $item !== "" && $item !== null && (!is_array($item) || count($item) > 0);
		});
	}
}

if(!function_exists("make_data")) {
	/**
	 * @param array $data
	 * @param bool $requiredUser
	 * @return array
	 */
	function make_data(array $data, $requiredUser = true)
	{
		$request = filter_empty_array($data);

		if ($requiredUser && empty($request['User'])) {
			$request['User'] = getenv('LIBERTY_USERNAME');
		}

		return $request;
	}
}
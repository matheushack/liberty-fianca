<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 18/05/20
 * Time: 19:43
 */

namespace MatheusHack\LibertyFianca\Entities;


use Dallgoot\Yaml;

/**
 * Class Request
 * @package MatheusHack\LibertyFianca\Entities
 */
class Request
{
	/**
	 * @var array
	 */
	private $mappingFields = [];

	/**
	 * Request constructor.
	 * @param array $data
	 */
	function __construct($data = [])
	{
		$this->setMappingFields($data);
	}

	/**
	 * @return array
	 */
	public function getData()
	{
		return $this->mappingFields;
	}

	/**
	 * @param array $data
	 * @return bool
	 * @throws \Exception
	 */
	private function setMappingFields(array $data)
	{
		$this->mappingFields = $data;

		if(!empty(getenv('LIBERTY_MAPPING_FIELDS')) && file_exists(getenv('LIBERTY_MAPPING_FIELDS'))) {
			$fields = Yaml::parseFile(getenv('LIBERTY_MAPPING_FIELDS'))->jsonSerialize();
			$this->mappingFields = $this->recursiveData($data, $fields);
		}

		return true;
	}

	/**
	 * @param $data
	 * @param $fields
	 * @return mixed
	 */
	private function recursiveData($data, $fields)
	{
		if(is_array($data)){
			foreach($data as $key => $value) {
				if(is_array($data[$key])) {
					$keyReplaced = data_get($key, $fields, $key);
					$response[$keyReplaced] = $this->recursiveData($data[$key], $fields);
					continue;
				}

				$key = data_get($key, $fields, $key);
				$response[$key] = $value;
			}
		}

		return $response;
	}
}
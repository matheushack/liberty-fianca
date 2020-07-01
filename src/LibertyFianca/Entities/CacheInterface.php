<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Entities;


/**
 * Interface CacheInterface
 * @package MatheusHack\LibertyFianca\Entities
 */
interface CacheInterface
{
	/**
	 * @param $key
	 * @param string $value
	 * @param int $time
	 * @return mixed
	 */
	public function add($key, $value = '', $time = 60);

	/**
	 * @param $key
	 * @return mixed
	 */
	public function get($key);

	/**
	 * @return mixed
	 */
	public function flush($key = '');
}
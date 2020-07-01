<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Http;


use MatheusHack\LibertyFianca\Entities\Cookie;

/**
 * Class Cache
 * @package MatheusHack\LibertyFianca\Http
 */
class Cache
{
	/**
	 * @var
	 */
	private $cache;

	/**
	 * Cache constructor.
	 */
	public function __construct()
	{
		switch (getenv('LIBERTY_CACHE')){
			default:
				$this->cache = new Cookie();
				break;
			case 'memcache':
				$this->cache = new \Memcache('libertyfianca-project');
				$this->cache->addServer(getenv('LIBERTY_MEMCACHE_HOST'), getenv('LIBERTY_MEMCACHE_PORT'));
				break;
		}

	}

	/**
	 * @param $key
	 * @param string $value
	 * @param int $time
	 * @return bool
	 */
	public function set($key, $value = '', $time = 60)
	{
		try {
			return $this->cache->add($key, $value, $time);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @param $key
	 * @param string $value
	 * @return bool
	 */
	public function rememberForever($key, $value = '')
	{
		try {
			return $this->cache->add($key, $value, 0);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @param $key
	 * @return bool|mixed
	 */
	public function get($key)
	{
		try {
			return $this->cache->get($key);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @return bool
	 */
	public function clear($key = '')
	{
		try {
			if(!($this->cache instanceof \Memcache))
				return $this->cache->flush($key);

			return $this->cache->flush();
		} catch (\Exception $e){
			return false;
		}
	}

}
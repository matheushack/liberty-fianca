<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 18/05/20
 * Time: 16:53
 */

namespace MatheusHack\LibertyFianca;


use MatheusHack\LibertyFianca\Services\ServiceDomains;

/**
 * Class Domains
 * @package MatheusHack\LibertyFianca
 */
class Domains
{
	/**
	 * @var ServiceDomains
	 */
	private $service;

	/**
	 * Domains constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceDomains();
	}

	/**
	 * @return Entities\Response
	 */
	public function coverages()
	{
		return $this->service->coverages();
	}
}
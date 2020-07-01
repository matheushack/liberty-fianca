<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 18/05/20
 * Time: 16:56
 */

namespace MatheusHack\LibertyFianca\Services;


use Exception;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Http\LibertyFianca;

/**
 * Class ServiceDomains
 * @package MatheusHack\LibertyFianca\Services
 */
class ServiceDomains
{
	/**
	 * @var LibertyFianca
	 */
	private $liberty;

	/**
	 * ServiceDomains constructor.
	 */
	function __construct()
	{
		$this->liberty = new LibertyFianca();
	}

	/**
	 * @return Response
	 */
	public function coverages()
	{
		try {
			return $this->liberty->coverages();
		} catch (Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}
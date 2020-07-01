<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 07/06/20
 * Time: 11:34
 */

namespace MatheusHack\LibertyFianca\Services;


use Exception;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Http\LibertyFianca;

/**
 * Class ServiceProposal
 * @package MatheusHack\LibertyFianca\Services
 */
class ServiceProposal
{
	/**
	 * @var LibertyFianca
	 */
	private $liberty;

	/**
	 * ServiceProposal constructor.
	 */
	function __construct()
	{
		$this->liberty = new LibertyFianca();
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function proposal(array $data)
	{
		try {
			$request = make_data($data);
			return $this->liberty->proposal($request);
		} catch (Exception $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}
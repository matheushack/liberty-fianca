<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 07/06/20
 * Time: 12:11
 */

namespace MatheusHack\LibertyFianca\Services;


use Exception;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Http\LibertyFianca;

/**
 * Class ServiceDocuments
 * @package MatheusHack\LibertyFianca\Services
 */
class ServiceDocuments
{
	/**
	 * @var LibertyFianca
	 */
	private $liberty;

	/**
	 * ServiceDocuments constructor.
	 */
	function __construct()
	{
		$this->liberty = new LibertyFianca();
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function upload(array $data)
	{
		try {
			$request = make_data($data);
			return $this->liberty->upload($request);
		} catch (Exception $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function printing(array $data)
	{
		try {
			$request = make_data($data);
			return $this->liberty->printing($request);
		} catch (Exception $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}
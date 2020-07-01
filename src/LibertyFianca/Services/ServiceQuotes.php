<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 18/05/20
 * Time: 17:35
 */

namespace MatheusHack\LibertyFianca\Services;


use Exception;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Http\LibertyFianca;

/**
 * Class ServiceQuotes
 * @package MatheusHack\LibertyFianca\Services
 */
class ServiceQuotes
{
	/**
	 * @var LibertyFianca
	 */
	private $liberty;

	/**
	 * ServiceQuotes constructor.
	 */
	function __construct()
	{
		$this->liberty = new LibertyFianca();
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function calculate(array $data)
	{
		try {
			$request = make_data($data);
			return $this->liberty->quote($request);
		} catch (Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function search(array $data)
	{
		try {
			$request = make_data($data);
			return $this->liberty->getQuote($request);
		} catch (Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function update(array $data)
	{
		try {
			$request = make_data($data);
			return $this->liberty->updateQuote($request);
		} catch (Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}
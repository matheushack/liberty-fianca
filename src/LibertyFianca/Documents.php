<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/05/20
 * Time: 19:02
 */

namespace MatheusHack\LibertyFianca;

use MatheusHack\LibertyFianca\Domains\PrintType;
use MatheusHack\LibertyFianca\Domains\QuoteStage;
use MatheusHack\LibertyFianca\Entities\Request;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Entities\ValidateResponse;
use MatheusHack\LibertyFianca\Services\ServiceDocuments;
use MatheusHack\LibertyFianca\Validate\LibertyValidate;
use ReflectionException;

/**
 * Class Documents
 * @package MatheusHack\LibertyFianca
 */
class Documents
{
	/**
	 * @var ServiceDocuments
	 */
	private $service;

	/**
	 * Documents constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceDocuments();
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function upload(Request $request)
	{
		$data = $request->getData();
		$validator = new LibertyValidate($data);

		try {
			$validator->rules([
				'required' => [
					'QuoteNo',
					'QuoteStage',
					'File',
					'FileName'
				],
				'base64' => [
					'File'
				],
				'in' => [
					['QuoteStage', array_values(QuoteStage::getAll())]
				]
			]);
		} catch (ReflectionException $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage("Invalid request");
		}

		if (!$validator->validate()) {
			return (new ValidateResponse)->error($validator);
		}

		return $this->service->upload($data);
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function printing(Request $request)
	{
		$data = $request->getData();
		$validator = new LibertyValidate($data);

		try {
			$validator->rules([
				'required' => [
					'PolicyNo',
					'PrintType',
				],
				'in' => [
					['PrintType', array_values(PrintType::getAll())]
				]
			]);
		} catch (ReflectionException $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage("Invalid request");
		}

		if (!$validator->validate()) {
			return (new ValidateResponse)->error($validator);
		}

		return $this->service->printing($data);
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/05/20
 * Time: 18:48
 */

namespace MatheusHack\LibertyFianca;

use MatheusHack\LibertyFianca\Domains\DegreeRelationship;
use MatheusHack\LibertyFianca\Domains\EmploymentRelationship;
use MatheusHack\LibertyFianca\Domains\HirePlan;
use MatheusHack\LibertyFianca\Domains\MaritalStatus;
use MatheusHack\LibertyFianca\Domains\Professions;
use MatheusHack\LibertyFianca\Domains\PropertyType;
use MatheusHack\LibertyFianca\Domains\Purpose;
use MatheusHack\LibertyFianca\Domains\RentReason;
use MatheusHack\LibertyFianca\Domains\SituationCurrentAddress;
use MatheusHack\LibertyFianca\Domains\TimeCurrentAddress;
use MatheusHack\LibertyFianca\Entities\Request;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Entities\ValidateResponse;
use MatheusHack\LibertyFianca\Validate\LibertyValidate;
use ReflectionException;
use MatheusHack\LibertyFianca\Services\ServiceQuotes;

/**
 * Class Quote
 * @package MatheusHack\LibertyFianca
 */
class Quote
{
	/**
	 * @var ServiceQuotes
	 */
	private $service;

	/**
	 * Quote constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceQuotes();
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function calculate(Request $request)
	{
		$data = $request->getData();
		$validator = new LibertyValidate($data);

		try {
			$validator->rules([
				'required' => [
					'OfferLetter',
					'BrokerEmail',
					'FollowUpEmail',
					'Purpose',
					'HirePlan',
					'TenantData.PublicIdNumber',
					'TenantData.Name',
					'TenantData.TelephoneDDD',
					'TenantData.PublicIdNumber',
					'TenantData.PublicIdNumber',
					'TenantData.Name',
					'TenantData.TelephoneDDD',
					'TenantData.TelephoneNumber',
					'TenantData.CellphoneDDD',
					'TenantData.CellphoneNumber',
					'TenantData.Email',
					'Coverages'
				],
				'in' => [
					['Purpose', array_values(Purpose::getAll())],
					['HirePlan', array_values(HirePlan::getAll())],
					['MaritalStatus', array_values(MaritalStatus::getAll())],
					['TimeCurrentAddress', array_values(TimeCurrentAddress::getAll())],
					['SituationCurrentAddress', array_values(SituationCurrentAddress::getAll())],
					['EmploymentRelationship', array_values(EmploymentRelationship::getAll())],
					['PropertyType', array_values(PropertyType::getAll())],
					['RentReason', array_values(RentReason::getAll())],
					['DegreeRelationship', array_values(DegreeRelationship::getAll())],
					['CurrentProfession', array_values(Professions::getAll())]
				],
				'array' => [
					'TenantData',
					'TenantData.CurrentAddress',
					'TenantData.ProfessionalData',
					'TenantData.SpouseData',
					'PropertyRent',
					'OthersTenants',
					'Coverages',
					'Coverages.Coverage',
					'Coverages.Coverage.*.CoverageReference'
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

		return $this->service->calculate($data);
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function search(Request $request)
	{
		$data = $request->getData();
		$validator = new LibertyValidate($data);

		$validator->rules([
			'required' => [
				'QuoteNo'
			]
		]);

		if (!$validator->validate()) {
			return (new ValidateResponse)->error($validator);
		}

		return $this->service->search($data);
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		$data = $request->getData();
		$validator = new LibertyValidate($data);

		try {
			$validator->rules([
				'required' => [
					'QuoteNo',
					'Note',
					'OfferLetter',
					'BrokerEmail',
					'FollowUpEmail',
					'Purpose',
					'HirePlan',
					'TenantData.PublicIdNumber',
					'TenantData.Name',
					'TenantData.TelephoneDDD',
					'TenantData.PublicIdNumber',
					'TenantData.PublicIdNumber',
					'TenantData.Name',
					'TenantData.TelephoneDDD',
					'TenantData.TelephoneNumber',
					'TenantData.CellphoneDDD',
					'TenantData.CellphoneNumber',
					'TenantData.Email',
					'Coverages'
				],
				'in' => [
					['Purpose', array_values(Purpose::getAll())],
					['HirePlan', array_values(HirePlan::getAll())],
					['MaritalStatus', array_values(MaritalStatus::getAll())],
					['TimeCurrentAddress', array_values(TimeCurrentAddress::getAll())],
					['SituationCurrentAddress', array_values(SituationCurrentAddress::getAll())],
					['EmploymentRelationship', array_values(EmploymentRelationship::getAll())],
					['PropertyType', array_values(PropertyType::getAll())],
					['RentReason', array_values(RentReason::getAll())],
					['DegreeRelationship', array_values(DegreeRelationship::getAll())]
				],
				'array' => [
					'TenantData',
					'TenantData.CurrentAddress',
					'TenantData.ProfessionalData',
					'TenantData.SpouseData',
					'PropertyRent',
					'OthersTenants',
					'Coverages',
					'Coverages.Coverage',
					'Coverages.Coverage.*.CoverageReference'
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

		return $this->service->update($data);
	}
}
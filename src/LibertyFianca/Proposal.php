<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/05/20
 * Time: 18:49
 */

namespace MatheusHack\LibertyFianca;

use MatheusHack\LibertyFianca\Domains\HirePlan;
use MatheusHack\LibertyFianca\Domains\IncomeGroup;
use MatheusHack\LibertyFianca\Domains\PaymentMethod;
use MatheusHack\LibertyFianca\Domains\PropertyType;
use MatheusHack\LibertyFianca\Domains\Purpose;
use MatheusHack\LibertyFianca\Domains\RelationshipExposedPersonPolitically;
use MatheusHack\LibertyFianca\Domains\RentReason;
use MatheusHack\LibertyFianca\Entities\Request;
use MatheusHack\LibertyFianca\Entities\Response;
use MatheusHack\LibertyFianca\Entities\ValidateResponse;
use MatheusHack\LibertyFianca\Services\ServiceProposal;
use MatheusHack\LibertyFianca\Validate\LibertyValidate;
use ReflectionException;

/**
 * Class Proposal
 * @package MatheusHack\LibertyFianca
 */
class Proposal
{
	/**
	 * @var ServiceProposal
	 */
	private $service;

	/**
	 * Proposal constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceProposal();
	}

	/**
	 * @param Request $request
	 * @return Response
	 */
	public function prepare(Request $request)
	{
		$data = $request->getData();
		$validator = new LibertyValidate($data);

		try {
			$validator->rules([
				'required' => [
					'QuoteNo',
					'StartDate',
					'EndDate',
					'Note',
					'Purpose',
					'HirePlan',
					'TenantData',
					'TenantData.IncomeGroup',
					'Lessor.PublicIdNumber',
					'Lessor',
					'Lessor.Name',
					'Lessor.Email',
					'Lessor.IncomeGroup',
					'Lessor.TelephoneDDD',
					'Lessor.TelephoneNumber',
					'Lessor.ProfessionActivity',
					'Lessor.Address.ZipCode',
					'Lessor.Address.StreetName',
					'Lessor.Address.StreetNumber',
					'Lessor.Address.StreetExtraInformation',
					'Lessor.Address.DistrictName',
					'Lessor.Address.CityName',
					'Lessor.Address.StateCode',
					'PropertyRent',
					'PropertyRent.StartDate',
					'PropertyRent.EndDate',
					'PropertyRent.PropertyType',
					'PropertyRent.RentReason',
					'PropertyRent.Address.ZipCode',
					'PropertyRent.Address.StreetName',
					'PropertyRent.Address.StreetNumber',
					'PropertyRent.Address.StreetExtraInformation',
					'PropertyRent.Address.DistrictName',
					'PropertyRent.Address.CityName',
					'PropertyRent.Address.StateCode',
					'PaymentData',
					'PaymentData.PaymentMethod',
					'PaymentData.InstallmentNo',
					'Coverages',
					'Coverages.Coverage',
					'Coverages.Coverage.*.InsuredAmount',
				],
				'in' => [
					['Purpose', array_values(Purpose::getAll())],
					['HirePlan', array_values(HirePlan::getAll())],
					['IncomeGroup', array_values(IncomeGroup::getAll())],
					['RelationshipExposedPersonPolitically', array_values(RelationshipExposedPersonPolitically::getAll())],
					['PropertyType', array_values(PropertyType::getAll())],
					['RentReason', array_values(RentReason::getAll())],
					['PaymentMethod', array_values(PaymentMethod::getAll())],
				],
				'array' => [
					'TenantData',
					'Lessor',
					'Lessor.Address',
					'PropertyRent',
					'PropertyRent.Address',
					'PaymentData',
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

		return $this->service->proposal($data);
	}
}
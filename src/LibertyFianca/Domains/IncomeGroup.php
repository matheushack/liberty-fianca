<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:34
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class IncomeGroup
 * @package MatheusHack\LibertyFianca\Domains
 */
class IncomeGroup
{
	use ConstantsTrait;

	/**
	 *
	 */
	const ATE_1_SALARIO = 1;

	/**
	 *
	 */
	const ATE_2_SALARIOS = 2;

	/**
	 *
	 */
	const ATE_3_SALARIOS = 3;

	/**
	 *
	 */
	const ATE_5_SALARIOS = 4;

	/**
	 *
	 */
	const ATE_10_SALARIOS = 5;

	/**
	 *
	 */
	const ATE_20_SALARIOS = 6;

	/**
	 *
	 */
	const ACIMA_20_SALARIOS = 7;

	/**
	 *
	 */
	const SEM_RENDA = 8;
}
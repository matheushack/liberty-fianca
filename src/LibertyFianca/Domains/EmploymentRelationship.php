<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:30
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class EmploymentRelationship
 * @package MatheusHack\LibertyFianca\Domains
 */
class EmploymentRelationship
{
	use ConstantsTrait;

	/**
	 *
	 */
	const APOSENTADO_OU_PENSIONISTA = 1;

	/**
	 *
	 */
	const AUTONOMO = 2;

	/**
	 *
	 */
	const CLT = 3;

	/**
	 *
	 */
	const ESTAGIARIO = 4;

	/**
	 *
	 */
	const FUNCIONARIO_PUBLICO = 5;

	/**
	 *
	 */
	const PROFISSIONAL_LIBERAL = 6;

	/**
	 *
	 */
	const PJ = 7;
}
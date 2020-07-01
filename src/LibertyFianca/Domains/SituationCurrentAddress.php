<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:29
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class SituationCurrentAddress
 * @package MatheusHack\LibertyFianca\Domains
 */
class SituationCurrentAddress
{
	use ConstantsTrait;

	/**
	 *
	 */
	const ALUGUEL = 1;

	/**
	 *
	 */
	const FINANCIADA = 2;

	/**
	 *
	 */
	const HOTEL = 3;

	/**
	 *
	 */
	const FLAT = 3;

	/**
	 *
	 */
	const PROPRIA = 4;
}
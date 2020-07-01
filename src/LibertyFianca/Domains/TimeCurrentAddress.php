<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:28
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class TimeCurrentAddress
 * @package MatheusHack\LibertyFianca\Domains
 */
class TimeCurrentAddress
{
	use ConstantsTrait;

	/**
	 *
	 */
	const MENOS_1_ANO = 1;

	/**
	 *
	 */
	const DE_1_A_3_ANOS = 2;

	/**
	 *
	 */
	const DE_3_A_5_ANOS = 3;

	/**
	 *
	 */
	const ACIMA_DE_5_ANOS = 4;
}
<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:33
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class RentReason
 * @package MatheusHack\LibertyFianca\Domains
 */
class RentReason
{
	use ConstantsTrait;

	/**
	 *
	 */
	const DIVORCIO = 1;

	/**
	 *
	 */
	const ESTUDO = 2;

	/**
	 *
	 */
	const INDEPENDENCIA = 3;

	/**
	 *
	 */
	const MAIS_ADEQUADO = 4;

	/**
	 *
	 */
	const TRANSFERENCIA_EMPRESA = 5;
}
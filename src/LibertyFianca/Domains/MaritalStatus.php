<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:27
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class MaritalStatus
 * @package MatheusHack\LibertyFianca\Domains
 */
class MaritalStatus
{
	use ConstantsTrait;

	/**
	 *
	 */
	const SOLTEIRO = 1;

	/**
	 *
	 */
	const CASADO = 2;

	/**
	 *
	 */
	const SEPARADO = 3;

	/**
	 *
	 */
	const DIVORCIADO = 4;

	/**
	 *
	 */
	const VIUVO = 5;

	/**
	 *
	 */
	const UNIAO_ESTAVEL = 6;
}
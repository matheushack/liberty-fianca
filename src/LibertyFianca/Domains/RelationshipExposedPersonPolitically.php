<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:38
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class RelationshipExposedPersonPolitically
 * @package MatheusHack\LibertyFianca\Domains
 */
class RelationshipExposedPersonPolitically
{
	use ConstantsTrait;

	/**
	 *
	 */
	const PAI = 1;

	/**
	 *
	 */
	const MAE = 2;

	/**
	 *
	 */
	const FILHO = 3;

	/**
	 *
	 */
	const CONJUGE = 4;

	/**
	 *
	 */
	const FILHA = 5;

	/**
	 *
	 */
	const IRMAO = 6;

	/**
	 *
	 */
	const CUNHADO = 7;

	/**
	 *
	 */
	const HOUSE_HOLD = 8;

	/**
	 *
	 */
	const ADMINISTRADOR = 9;

	/**
	 *
	 */
	const CONTROLADO = 10;

	/**
	 *
	 */
	const OUTROS = 11;
}
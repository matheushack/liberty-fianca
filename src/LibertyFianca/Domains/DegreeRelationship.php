<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:35
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class DegreeRelationship
 * @package MatheusHack\LibertyFianca\Domains
 */
class DegreeRelationship
{
	use ConstantsTrait;

	/**
	 *
	 */
	const FILHO = 2;

	/**
	 *
	 */
	const ENTEADO = 3;

	/**
	 *
	 */
	const MAE = 4;

	/**
	 *
	 */
	const PAI = 5;

	/**
	 *
	 */
	const OUTROS = 6;
}
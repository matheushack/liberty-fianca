<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:32
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class PropertyType
 * @package MatheusHack\LibertyFianca\Domains
 */
class PropertyType
{
	use ConstantsTrait;

	/**
	 *
	 */
	const APARTAMENTO = 1;

	/**
	 *
	 */
	const CASA = 2;

	/**
	 *
	 */
	const SOBRADO = 3;

	/**
	 *
	 */
	const COMERCIAL = 4;

	/**
	 *
	 */
	const CONSULTORIO = 5;

	/**
	 *
	 */
	const ESCRITORIO = 6;

	/**
	 *
	 */
	const OUTROS = 7;
}
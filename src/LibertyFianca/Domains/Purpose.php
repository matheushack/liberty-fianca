<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:23
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;
use MatheusHack\LibertyFianca\Traits\ConvertTrait;

/**
 * Class Purpose
 * @package MatheusHack\LibertyFianca\Domains
 */
class Purpose
{
	use ConstantsTrait, ConvertTrait;

	/**
	 *
	 */
	const ALUGUEL_RESIDENCIAL = 10;

	/**
	 *
	 */
	const ALUGUEL_COMERCIAL = 11;
}
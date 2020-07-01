<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:44
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class PrintType
 * @package MatheusHack\LibertyFianca\Domains
 */
class PrintType
{
	use ConstantsTrait;

	/**
	 *
	 */
	const APOLICE = 'AF';

	/**
	 *
	 */
	const BOLETO = 'B';
}
<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 18:37
 */

namespace MatheusHack\LibertyFianca\Domains;


use MatheusHack\LibertyFianca\Traits\ConstantsTrait;

/**
 * Class PaymentMethod
 * @package MatheusHack\LibertyFianca\Domains
 */
class PaymentMethod
{
	use ConstantsTrait;

	/**
	 *
	 */
	const COBRANCA_AGRUPADA = 4;
}
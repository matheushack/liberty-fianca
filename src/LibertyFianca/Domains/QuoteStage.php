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
 * Class QuoteStage
 * @package MatheusHack\LibertyFianca\Domains
 */
class QuoteStage
{
	use ConstantsTrait;

	/**
	 *
	 */
	const ANALISE_CADASTRAL = 1;

	/**
	 *
	 */
	const PROPOSTA = 2;
}
<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Http;

/**
 * Class LibertyFianca
 * @package MatheusHack\LibertyFianca\Http
 */
class LibertyFianca extends Authentication
{
	/**
	 * @param $request
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function quote($request)
	{
		return $this->execute('quote', 'POST', $request);
	}

	/**
	 * @param $request
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function getQuote($request)
	{
		return $this->execute(sprintf('quote?quoteNo=%s&user=%s',
			$request['QuoteNo'],
			$request['User']
		), 'GET');
	}

	/**
	 * @param $request
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function updateQuote($request)
	{
		return $this->execute('quote', 'PUT', $request);
	}

	/**
	 * @param $request
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function proposal($request)
	{
		return $this->execute('proposal', 'POST', $request);
	}

	/**
	 * @param $request
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function upload($request)
	{
		return $this->execute('fileUpload', 'POST', $request);
	}

	/**
	 * @param $request
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function printing($request)
	{
		return $this->execute(sprintf('print?policyNo=%s&printType=%s&user=%s',
			$request['PolicyNo'],
			$request['PrintType'],
			$request['User']
		), 'GET');
	}

	/**
	 * @return \MatheusHack\LibertyFianca\Entities\Response
	 */
	public function coverages()
	{
		return $this->execute('domain', 'GET');
	}
}
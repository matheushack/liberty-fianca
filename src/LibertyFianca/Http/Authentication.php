<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Http;

use Exception;
use GuzzleHttp\Client;
use MatheusHack\LibertyFianca\Entities\Response;
use GuzzleHttp\Exception\RequestException;

/**
 * Class Authentication
 * @package MatheusHack\LibertyFianca\Http
 */
class Authentication
{
	/**
	 * @var Client
	 */
	private $httpClient;
	/**
	 * @var Cache
	 */
	private $cache;

	/**
	 * Authentication constructor.
	 */
	public function __construct()
	{
		$this->cache = new Cache();
		$this->httpClient = new Client();
	}

	/**
	 * @param $endpoint
	 * @param string $method
	 * @param array $parameters
	 * @param bool $isMultipart
	 * @return Response
	 */
	protected function execute($endpoint, $method = 'GET', $parameters = [], $isMultipart = false)
	{
		try {
			$token = $this->authorize();

			if(!$token) {
				throw new Exception('Token invalid');
			}

			$endpoint = sprintf("%s/%s", getenv('LIBERTY_URL'), $endpoint);
			$content = $this->makeContent($token, $parameters, $isMultipart);

			switch ($method){
				default:
					$response = $this->httpClient->request('GET', $endpoint, $content);
					break;
				case 'POST':
					$response = $this->httpClient->request('POST', $endpoint, $content);
					break;
				case 'PUT':
					$response = $this->httpClient->request('PUT', $endpoint, $content);
					break;
				case 'PATCH':
					$response = $this->httpClient->request('PATCH', $endpoint, $content);
					break;
			}

			$libertyResponse = json_decode($response->getBody());

			if(!$libertyResponse->Success) {
				$responseErrors = [];
				$messages = is_array($libertyResponse->Messages) ? $libertyResponse->Messages : [$libertyResponse->Messages];

				foreach ($messages as $message){
					$responseErrors[] = $message->Description;
				}

				throw new Exception(implode(PHP_EOL, $responseErrors));
			}

			return (new Response)
				->setSuccess(true)
				->setData($libertyResponse->Data);
		} catch (RequestException $e) {
			if($e->getCode() == 401){
				$this->cache->clear('token_authorize_liberty');
				return $this->execute($endpoint, $method, $parameters, $isMultipart);
			}

			if($e->getCode() == 400){
				$responseErrors = [];
				$libertyResponse = json_decode($e->getResponse()->getBody());
				$messages = is_array($libertyResponse->Messages) ? $libertyResponse->Messages : [$libertyResponse->Messages];

				foreach ($messages as $message){
					$responseErrors[] = $message->Description;
				}

				return (new Response)
					->setSuccess(false)
					->setMessage(implode(PHP_EOL, $responseErrors));
			}


			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		} catch (Exception $e) {
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @return bool|mixed
	 */
	protected function authorize()
	{
		$token = $this->cache->get('token_authorize_liberty');

		if($token) {
			return $token;
		}

		$tries = getenv('LIBERTY_TOKEN_TRIES') ? (int) getenv('LIBERTY_TOKEN_TRIES') : 1;

		for($t = 1; $t <= $tries; $t++) {
			try {
				$response = $this->httpClient->request('POST', getenv('LIBERTY_TOKEN_URL'), [
					'headers' => [
						'Content-Type' => 'application/x-www-form-urlencoded'
					],
					'form_params' => [
						'client_id' => getenv('LIBERTY_CLIENT_ID'),
						'client_secret' => getenv('LIBERTY_CLIENT_SECRET'),
						'username' => getenv('LIBERTY_USERNAME'),
						'password' => getenv('LIBERTY_PASSWORD')
					]
				]);

				if($response->getStatusCode() != 200) {
					throw new Exception();
				}

				$libertyResponse = json_decode($response->getBody());

				if(!$libertyResponse->success) {
					throw new Exception();
				}

				$this->cache->set('token_authorize_liberty', $libertyResponse->access_token, ($libertyResponse->expires_in / 1000));
				return $libertyResponse->access_token;
			} catch (Exception $e) {
				dd($e->getMessage());
				continue;
			}
		}

		return false;
	}

	/**
	 * @param $token
	 * @param $parameters
	 * @param $isMultipart
	 * @return array
	 */
	private function makeContent($token, $parameters, $isMultipart)
	{
		if($isMultipart) {
			return [
				"headers" => [
					'Authorization' => sprintf("Bearer %s", $token)
				],
				'multipart' => $this->hasStringKeys($parameters) ? [$parameters] : $parameters
			];
		}

		return [
			"headers" => [
				'Content-Type' => 'application/json',
				'Authorization' => sprintf("Bearer %s", $token)
			],
			'body' => !empty($parameters) ? json_encode($parameters) : ''
		];
	}

	/**
	 * @param array $data
	 * @return bool
	 */
	private function hasStringKeys(array $data)
	{
		return count(array_filter(array_keys($data), 'is_string')) > 0;
	}
}
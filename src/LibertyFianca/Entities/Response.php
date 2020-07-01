<?php
/**
 * Created by PhpStorm.
 * User: Matheus Hack
 * Date: 13/05/20
 * Time: 17:45
 */

namespace MatheusHack\LibertyFianca\Entities;

/**
 * Class Response
 * @package MatheusHack\LibertyFianca\Entities
 */
class Response
{
	/**
	 * @var
	 */
	public $success;

	/**
	 * @var
	 */
	public $message;

	/**
	 * @var
	 */
	public $data;

	/**
	 * @return mixed
	 */
	public function getSuccess()
	{
		return $this->success;
	}

	/**
	 * @param $success
	 * @return $this
	 */
	public function setSuccess($success)
	{
		$this->success = $success;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param $message
	 * @return $this
	 */
	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @param $data
	 * @return $this
	 */
	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}
}
<?php

namespace Koboaccountant\Foundation;


class JobResponse
{
	/**
	 * Status of operation
	 *
	 * @var string
	 */
	public $status = "error";

	/**
	 * Payload to be sent back
	 *
	 * @var null
	 */
	public $data = null;

	/**
	 * Message about what happened
	 *
	 * @var string
	 */
	public $message = "";

	/**
	 * JobResponse constructor.
	 *
	 * @param string $status
	 * @param        $message
	 * @param        $data
	 */
	public function __construct(string $status, $message, $data)
	{
		$this->status = $status;
		$this->data = $data;
		$this->message = $message;
	}

	public function __toString()
	{
		return json_encode($this);
	}
}
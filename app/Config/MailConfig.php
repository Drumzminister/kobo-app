<?php

namespace App\Config;


use Illuminate\Support\Facades\Log;
use ReflectionClass;

/**
 * Class MailConfig
 * @package App\Config
 * ToDO: We'll later implement a UI to dynamically set this things, what is present in this class will be defaults
 */
class MailConfig
{
	const DEFAULT_EMAIL_NAME    = "Kobo Accountant Team";

	/**
	 * @param $key
	 *
	 * @return string
	 */
	public static function getConfig($key): string
	{
		try
		{
			$class = new ReflectionClass( self::class );
		}
		catch ( \ReflectionException $e )
		{
			Log::error($e->getMessage());

			return null;
		}

		return $class->getConstant($key);
	}
}

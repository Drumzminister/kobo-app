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
	const DEFAULT_EMAIL_NAME    = "Storehouse Team";
	const DEFAULT_EMAIL         = "support@storehouse.com.ng";
	const SUPPORT_EMAIL         = "support@storehouseng";
	const CONTACT_EMAIL         = "contact@storehouse.com.ng";
	const CONTACT_EMAIL_NAME    = "Storehouse Contact";
	const SUPPORT_EMAIL_NAME    = "Storehouse Team";
	const BUDGET_SHARED_SUBJECT = "A budget has been shared with you!";
	const JOB_STATUS_SUBJECT    = "Storehouse Job Request Update";
	const VENDOR_STATUS_SUBJECT = "Storehouse Vendor Update";
	const BUDGETS_EMAIL         = "budgets@storehouse.com.ng";
	const BUDGETS_NAME          = "Budget Update";
	const NEW_USER_SUBJECT      = "New Customer account on Storehouse";
	const NEW_MESSAGE_SUBJECT   = "New Notification from Storehouse.ng";
	const NEW_CODE_SUBJECT      = "Storehouse Activation Code";
	const NEW_VENDOR_SUBJECT    = "New Vendor account on Storehouse";
	const WITHDRAWAL_DATE       = "Your withdrawal Day is it Today! You can now withdraw on Storehouse.";
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
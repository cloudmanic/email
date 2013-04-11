<?php

//
// By: Cloudmanic Labs (http://cloudmanic.com)
// Date: 4/10/13
//

class Email
{
	private static $i = null;

	//
	// Instance ...
	//
	public static function instance()
	{
		if(! self::$i)
		{
			self::$i = new CiEmail();
		}
        
		return self::$i;
	}

	//
	// Call static......
	//
	public static function __callStatic($method, $args)
	{
		return call_user_func_array(array(self::instance(), $method), $args);
	}
}

// ---------- Functions ------------ //

// set internal encoding for multibyte string functions if necessary
// and set a flag so we don't have to repeatedly use extension_loaded()
// or function_exists()
if(extension_loaded('mbstring'))
{
  define('MB_ENABLED', TRUE);
  mb_internal_encoding('UTF-8');
}else
{
  define('MB_ENABLED', FALSE);
}

if (
  @preg_match('/./u', 'é') === 1	// PCRE must support UTF-8
  && function_exists('iconv')	// iconv must be installed
  && MB_ENABLED === TRUE		// mbstring must be enabled
  )
{
  define('UTF8_ENABLED', TRUE);
} else
{
  define('UTF8_ENABLED', FALSE);
}

//
// Is PHP
//
if(! function_exists('is_php'))
{
	/**
	 * Determines if the current version of PHP is greater then the supplied value
	 *
	 * Since there are a few places where we conditionally test for PHP > 5.3
	 * we'll set a static variable.
	 *
	 * @param	string
	 * @return	bool	TRUE if the current version is $version or higher
	 */
	function is_php($version = '5.3.0')
	{
		static $_is_php;
		$version = (string) $version;

		if ( ! isset($_is_php[$version]))
		{
			$_is_php[$version] = (version_compare(PHP_VERSION, $version) >= 0);
		}

		return $_is_php[$version];
	}
}

/* End File */
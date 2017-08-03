<?php if (!defined('BASEPATH')) exit('No direct access allowed.');

/**
 * Creates an array or JSON aobject for your javascript files that need localization
 *
 * @param 	array
 * @param 	boolean
 * @return	string
 */

//
function json_lang($js_localized = array(), $return_json = TRUE)
{

	// if $js_localized is a string, then we assume it is the name of a lang file
	if (is_string($js_localized))
	{
		$path_parts = explode('/', $js_localized);

		// we use english because we know it exists... we just want the keys
		if (count($path_parts) >= 2)
		{
			$lang_path = MODULES_PATH.$path_parts[0].'/language/english/'.$path_parts[1].'_lang'.EXT;
		}
		else
		{
			$lang_path = APPPATH.'language/english/'.$path_parts[0].'_lang'.EXT;
		}

		if (file_exists($lang_path))
		{
			include($lang_path);
			$js_localized = array_keys($lang);
		}
		else
		{
			$js_localized = array();
		}
	}

	$vars = array();
	foreach($js_localized as $key => $val)
	{
		// handle both types of arrays
		if (is_int($key))
		{
			$vars[$val] = lang($val);
		}
		else
		{
			$vars[$key] = lang($key);
		}
	}

	if ($return_json)
	{
		return json_encode($vars);
	}
	return $vars;
}


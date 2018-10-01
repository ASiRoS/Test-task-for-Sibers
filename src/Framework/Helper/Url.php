<?php

namespace Framework\Helper;

class Url
{
	public static function redirect($url, $queries = [])
	{
		$header = "location: $url";

		if(!empty($queries)) {
			$queries = http_build_query($queries);
			$header .= "?" . $queries;
		}

		header($header);
		die();
	}
}
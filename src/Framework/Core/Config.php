<?php

namespace Framework\Core;

class Config
{
	private static $configs;

	public function setConfig($configs)
	{
		if($config == null) {
			self::$configs = $configs;
		}
	}

	public static function getSetting($settingName)
	{
		return in_array($settingName, self::$configs) ? self::$configs[$settingName] : null;
	}
}
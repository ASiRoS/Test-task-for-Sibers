<?php

namespace Framework\Database;

use \Illuminate\Events\Dispatcher;
use \Illuminate\Container\Container;
use \Framework\Core\Config;

class Database extends \Illuminate\Database\Capsule\Manager
{
	public static function factory()
	{
		$capsule = new self;

		$capsule->addConnection(Config::getSetting('db'));
		
		$capsule->setEventDispatcher(new Dispatcher(new Container));
		$capsule->setAsGlobal();
		$capsule->bootEloquent();
	}
}
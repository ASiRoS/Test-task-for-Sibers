<?php

return [
	'siteName' => 'Test task for Sibers',

	'isDev'    => true,

	'db'	   => [
		'driver' 	=> 'mysql', 
		'host' 		=> 'localhost',
		'database' 	=> 'tz',
		'username' 	=> 'root',
		'password' 	=> '',
		'charset' 	=> 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' 	=> '',
	],

	'avatar'   => [
		'path'    => '/assets/uploads/',
		'default' => 'default.png',
	],
];
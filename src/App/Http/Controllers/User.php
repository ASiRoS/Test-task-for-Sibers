<?php

namespace App\Http\Controllers;

use Framework\Http\Controller;

class User extends Controller
{
	public function index()
	{
		$html = $this->render('users/index', [
			'users' => ['mama', 'papa', 'programmist']
		]);
		
		$html = '123';

		return $this->write($html);
	}

	public function add()
	{
	    $html = '123';

	    return $this->write($html);
	}
}
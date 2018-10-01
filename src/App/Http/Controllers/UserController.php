<?php

namespace App\Http\Controllers;

use \Framework\Http\Controller;
use \App\Models\User;
use \Carbon\Carbon;
use Zend\Diactoros\Response\RedirectResponse;

class UserController extends Controller
{
	public function index()
	{
		$users = ['users' => $users];
		$html = $this->render('users/index', [
			'users' => User::paginate(6)
		]);

		User::paginate(6);

		return $this->write($html);
	}

	public function edit($request)
	{
		$html = $this->render('users/edit', [
			'isMale'   => User::IS_MALE,
			'isFemale' => User::IS_FEMALE,
			'user' 	   => User::findOrFail($request->getAttribute('id')),
			'errors'   => $this->errors($request)
		]);


		return $this->write($html);
	}

	public function update($request)
	{
		$params = $request->getParsedBody();

		$validation = User::validateEntries($params, true);

		if($validation !== true) {
			$this->redirect('/users/edit', $validation);
		}

		if(!empty($params['password'])) {
		    $params['password'] = password_hash($params['password'], PASSWORD_BCRYPT);
		} else {
			unset($params['password']);
		}

		$params['avatar'] = 'jlkj';

		$id = $request->getAttribute('id');

		$user = User::find($request->getAttribute('id'));

		$user->edit($params);

		$this->redirect('/users/'. $request->getAttribute('id'));

	}

	public function add($request)
	{
		$errors = $this->errors($request);

	    $html = $this->render('users/add', [
			'isMale'   => User::IS_MALE,
			'isFemale' => User::IS_FEMALE,
			'errors'   => $errors,
		]);

	    return $this->write($html);
	}

	public function store($request)
	{
		$params 			  		 = $request->getParsedBody();

		$validation 				 = User::validateEntries($params);

		if($validation !== true) {
			$this->redirect('/users/add', $validation);
		}

		$params['registration_date'] = Carbon::now();

		$params['password']   		 = password_hash($params['password'], PASSWORD_BCRYPT);

		$params['avatar'] 			 = 'jlkj';


		$users 				  		 = User::create($params);

		$this->redirect('/users');
	}

	public function view($request)
	{
		$user = User::find($request->getAttribute('id'));

		$html = $this->render('users/view', [
			'user' => $user,
			'isMale'   => User::IS_MALE,
			'isFemale' => User::IS_FEMALE,
		]); 

		return $this->write($html);
	}

	public function delete($request)
	{
		User::findOrFail($request->getAttribute('id'))->delete();

		$this->redirect('/users');
	}
}
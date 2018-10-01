<?php

namespace App\Models;

use Framework\Core\Config;

class User extends \Illuminate\Database\Eloquent\Model
{
	public $timestamps = false;

	protected $table = 'users';

	protected $fillable = [
		'login',
		'name',
		'lastname',
		'gender',
		'birthday',
		'description',
		'avatar'
	];

	protected $dates = [
		'birthday',
		'registration_date'
	];

	protected static $rules = [
		'login'    => 'required|alpha_numeric|max_len,30|min_len,3',
		'password'    => 'required|max_len,30|min_len,6',
		'name'       => 'required|max_len,100',
		'lastname' => 'required|max_len,100',
		'gender'      => 'required|exact_len,1|contains,1 2',
		'birthday' => 'required|date',
	];

	const IS_MALE   = 1;
	const IS_FEMALE = 2;

	public function edit($fields)
	{
		$validation = self::validateEntries($fields, true);

		if($validation !== true) {
			return $fields;
		}
		
		$this->fill($fields);

		if(isset($fields['password']) && !empty($fields['password'])) {
			$this->password = password_hash($fields['password'], PASSWORD_BCRYPT);
		}

		$this->saveOrFail();

	}

	public function getAvatarAttribute($avatar)
	{
		$config = Config::getSetting('avatar'); 

		$relativePath = $config['path'] . $avatar;

		if($avatar && file_exists($imagePath = CURRENT_DIRECTORY . $relativePath)) {
			return $relativePath;
		} else {
			return $config['path'] . $config['default'];
		} 

	}

	public static function validateEntries(array $user, $passwordIsNotRequired = false) 
	{
		$gump = new \GUMP;

		$rules = self::$rules;

		if($passwordIsNotRequired) {
			unset($rules['password']);
		}

		$validation = $gump->validation_rules($rules);

		if($gump->run($user)) {
			$find = self::where('login', $user['login']);
			return true;
		} else {
			return $gump->get_readable_errors();
		}

	}
}
<?php

namespace Framework\Session;

use \rcastera\Browser\Session\Session;
use \Framework\Helper\Url;


class UserSession
{
	public static function setSession($id, $login)
	{
            $user = array(
                'user_id' => $id,
                'login'   => $login 
            );

            $session->register(120); 
            $session->set('user', $user);
            
            Url::redirect('/');
	}
}
<?php

namespace Engine\Core\Auth;

use Engine\Helper\Cookie;

class Auth implements AuthInterface{

	protected $autorized = false;
	protected $hash_user;

	public function autorized(){
		return $this->autorized;
	}

	public function hashUser(){
		return Cookie::get('auth_user');
	}

	public function autorize($user){
		Cookie::set('auth_autorized', true);
		Cookie::set('auth_user', $user);

		//$this->autorized = true;
		//$this->hash_user = $user;

	}

	public function unAutorize(){
		Cookie::delete('auth_autorized');
		Cookie::delete('auth_user');

		//$this->autorized = false;
		//$this->hash_user = null;
	}

	public static function salt(){
		return (string) rand(100000000, 99999999);
	}

	public static function encryptPassword($password, $salt = ''){
		return hash('sha256', $password, $salt);
	}
}
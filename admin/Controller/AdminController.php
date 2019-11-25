<?php 

namespace Admin\Controller;

use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller{
	
	protected $auth;

	/**
	 * @param \Engine\DI\DI
	 */
	public function __construct($di){
		parent::__construct($di);

		$this->auth = new Auth();

		if($this->auth->hashUser() == null){
			header('Location: '. SITE_DIR .'admin/login/');
			exit;
		}

	}

	public function checkAutorization(){
		
	}

	public function logout(){
		$this->auth->unAutorize();
		header('Location: '. SITE_DIR .'admin/login/');
		exit;
	}


}
<?php 

namespace Admin\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

class LoginController extends Controller {
	
	protected $auth;

	public function __construct(DI $di){
		parent::__construct($di);

		$this->auth = new Auth();

		if($this->auth->hashUser() !== null){
			header('Location: '. SITE_DIR . 'admin/', true, 301);
			exit;
		}

	}

	public function form(){

		$this->view->render('login');
	}

	public function authAdmin(){

		$params = $this->request->post;

		$query = $this->db->query('
			SELECT u.id, u.login, u.password, r.name as role, uh.hash
			FROM `user` `u`
			INNER JOIN `user_role` `ur` ON (`ur`.`id_user` = `u`.`id`)
			INNER JOIN `role` `r` ON (`r`.`id` = `ur`.`id_role`)
			INNER JOIN `user_hash` `uh` ON (`uh`.`id_user` = `u`.`id`)
			WHERE `login` = "' . $params['login'] . '" 
			AND `password`	= "'. md5($params['password']) . '"
			LIMIT 1
		');

		print_r($query);

		if(!empty($query)){
			$user = $query[0];

			if($user['role'] == 'admin'){
				$hash = md5($user['id'] . $this->auth->salt());

				$this->db->query('
					UPDATE user_hash 
					SET hash = "'. $hash .'"
					WHERE id_user="'. (int)$user['id'] .'"
				');


				$this->auth->autorize($hash);

				header('Location: '. SITE_DIR .'admin/login/');
				exit;
			}
		}

	}

}
<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider{
	
	public $serviceName = 'router';

	public function init(){
		$router = new Router('//'.$_SERVER['HTTP_HOST'].'/di/');

		$this->di->set($this->serviceName, $router);
	}
}
<?php

namespace Engine\Core\Router;

class DispatchedRoute{

	private $controller;
	private $parametrs;

	public function __construct($controller, $parametrs = []){
		$this->controller = $controller;
		$this->parametrs = $parametrs;
	}

	public function getController(){
		return $this->controller;
	}

	public function getParametrs(){
		return $this->parametrs;
	}

}
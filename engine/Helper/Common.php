<?php

namespace Engine\Helper;

class Common{
	public function construct(){}

	public static function isPost(){
		return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false; 
	}

	public static function getMethod(){
		return $_SERVER['REQUEST_METHOD']; 
	}

	public static function getPathUrl(){
		$pathUrl = $_SERVER['REQUEST_URI'];

		if($position = strpos($pathUrl, '?')){
			$pathUrl = substr($pathUrl, 0, $position);
		}

		return $pathUrl;
	}

}
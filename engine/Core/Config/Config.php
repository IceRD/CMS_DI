<?php

namespace Engine\Core\Config;

class Config{

	public static function item($key, $group = 'main'){
		$groupItems = static::file($group);

		return isset($groupItems[$key]) ? $groupItems[$key] : null;
	}

	public static function file($group){
		
		/* if(ENV != 'Cms'){
			$path = $_SERVER['DOCUMENT_ROOT'] . ROOT_FOLDER. mb_strtolower(ENV) . '/Config/' . $group . '.php';
		}else{
			$path = $_SERVER['DOCUMENT_ROOT'] . '/'. mb_strtolower(ENV) . '/admin/Config/' . $group . '.php';
		} */

		$path = ROOT_FOLDER . 'admin/Config/' . $group . '.php';

		if(file_exists($path)){

			$items = require_once $path;

			if(!empty($items)){
				return $items;

			}else{
				throw new \Exception(
					sprintf('Config file %s is not array ', $path)
				);
			}

		}else{

			throw new \Exception(
				sprintf('Cannot load config from file, file %s does not exist', $path)
			);

		}

		return false;
	}
}
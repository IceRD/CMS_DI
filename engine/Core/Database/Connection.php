<?php

namespace Engine\Core\Database;

use \PDO;
use Engine\Core\Config\Config;

class Connection{
	private $db;

	public function __construct(){
		$this->connect();
	}

	private function connect(){

		$config = Config::file('database');

		$dist = 'mysql:host='.$config['DB_HOST'].';dbname='.$config['DB_NAME'].';charset='.$config['DB_CHARSET'];

		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];

		$this->db = new PDO($dist, $config['DB_USERNAME'] , $config['DB_PASSWORD'], $opt);
	}

	public function query($sql){

		$query = $this->db->prepare($sql);
		$query->execute();
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		if($result === false){
			return [];
		}

		return $result;

	}

}
<?php

namespace Cms\Controller;

class HomeController extends CmsController{

	public function index(){

		$this->view->render('index');

	}

	public function pages($id){
		echo 'Pages ' . $id;
	}

	public function template(){
		echo 'Template Page';
	}
}
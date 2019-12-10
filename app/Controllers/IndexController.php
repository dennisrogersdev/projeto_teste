<?php

namespace App\Controllers;

//recursos (pasta VENDOR)
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {
		$produto = Container::getModel('Produto');
		$produto->__set('descricao','Mortadela');
		$this->view->descricao = $produto->__get('descricao');
		$this->render('index');
	}

}


?>
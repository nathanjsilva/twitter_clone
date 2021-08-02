<?php

namespace App\Controllers;

//os recursos do miniframework

use App\Models\Usuario;
use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

	public function index() {

		$this->render('index');
	}

	public function inscreverse() {
		$this->render('inscreverse');
	}

	public function registrar() {

		$nome  = $_POST['nome'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];

		$usuario = Container::getModel('Usuario');
		$usuario->__set('nome', $nome);
		$usuario->__set('email',$email);
		$usuario->__set('senha',$senha);

		$usuario-> inserirUsuario();
	}

}


?>
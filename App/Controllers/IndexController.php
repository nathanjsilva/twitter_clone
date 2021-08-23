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

		$this->view->usuario = array (
			"nome" => '',
			"email" => '',
			"senha" => '',
		);

		$this->view->erroCadastro = false;
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

		if(!empty($usuario -> validarCadastro()) && count($usuario-> getUsuarioPorEmail()) == 0){

			$usuario->inserirUsuario();
			$this->render('cadastro');

		}else {

			$this->view->usuario = array (
				"nome" => $_POST['nome'],
				"email" => $_POST['email'],
				"senha" => $_POST['senha'],
			);
			$this->view->erroCadastro = true;
			$this->render('inscreverse');
		}
	}


}


?>
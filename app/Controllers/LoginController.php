<?php

use App\Functions\View;
use App\Functions\Controller;
use App\Models\User;
use App\Models\Livro;

class LoginController {
	public function index($params){
		extract($params);

		if(isset($_POST['submit'])){
			$this->login();
		}else{
			View::to('home');
		}
	}

	public function login(){
		$login = $_POST['login'];
		$senha = $_POST['password'];

		if(User::exists('login', $login)){
			if($senha == User::where('login', $login)->senha){

				session_start();
				$_SESSION['login'] = false;
				header('location: ./login');
			}else{
				echo 'senha incorreta';
			}
		}
		else{
			echo 'Nenhum login foi encontrado.';
		}
	}

	public function logout(){
		if(session_start())
			session_destroy();
	}
}
<?php

namespace App\Functions;
use App\Routes\GetRoutes;


class GetUrl{

	private $explode = '';
	private $request_uri = '';
	private $view = '';
	private $params = '';
	private $controller = '';
	private $controllerName = '';

	public function __construct(){
		$this->setExploder();
		$this->setRequestUri();
		$this->setView();
		$this->setController();
		$this->setParams();
		$this->runController();

	}

	public function params(){
		if(count($this->params) == 0)
			return false;
		else
			return true;
	}

	public function getView(){
		return $this->view;
	}

	public function getParams(){
		return $this->params;
	}

	public function getUri(){
		return $this->request_uri;
	}
	public function setController(){
		$routes_obj = new GetRoutes;
		$routes = $routes_obj->get();
		$this->controller = ((array)$routes)[$this->view];
		$this->controllerName = array_keys($this->controller)[0];
	}


	public function setExploder(){

		$explode = $_SERVER['REQUEST_URI'];
		$explode = substr($explode, 1);
		$explode = explode('/',$explode);
		unset($explode[0]);
		$explode = array_values($explode);
		if($explode[0] == ''){
			header('Location: ./home');
			exit;
		}


		$this->explode = $explode;
	}

	public function setRequestUri(){
		$request_uri = $_SERVER['REQUEST_URI'];
		$request_uri = substr($request_uri, 1);
		$request_uri = explode('/',$request_uri);
		unset($request_uri[0]);
		$request_uri = array_values($request_uri);


		$this->request_uri = implode("/", $request_uri);
	}

	public function setView(){
		$routes_obj = new GetRoutes;

		$routes = (array)$routes_obj->get();
		$request_uri = $this->request_uri;
		$view = '404';
		foreach (array_keys($routes) as $route) {
			if(substr($request_uri, 0, strlen($route)) == $route){
				if(isset($request_uri[strlen($route)])){
					
					if($request_uri[strlen($route)] == '/'){
						$view = $route;
						break;
					}

				}else{
					$view = $route;
					break;
				}
			}	
		}

		if($view == '404')
			die('erro 404, View não encontrada');

		$this->view = $view;
	}

	public function setParams(){
		$view = $this->view;
		$uri = $this->request_uri;
		$routes_obj = new GetRoutes;
		$routes = $routes_obj->get();
		$params_names = $this->controller[array_keys($this->controller)[0]];
		$x = 0;
		$params_values = substr($uri, strlen($view), strlen($uri));
		$params_values = explode('/', $params_values);
		unset($params_values[0]);
		$params_values = array_values($params_values);
		if(count($params_values) != count($params_names)){
			die('Número de parâmetros da URL incorretos');
		}
		$params = [];
		foreach($params_names as $param_name){
			$params[$param_name] = $params_values[$x];
			$x++;
		}

		$this->params = $params;
	}

	public function runController(){
		$controller = $this->controllerName;
		$controller_explode = explode('@', $controller);
		$controller = $controller_explode[0];
		$method = $controller_explode[1];
		if(file_exists($_SERVER['DOCUMENT_ROOT'] . "/namespace/app/Controllers/" . $controller . ".php")){
			require $_SERVER['DOCUMENT_ROOT'] . "/namespace/app/Controllers/" . $controller . ".php";
			if(class_exists($controller)){
				$obj_controller = new $controller;
				if(method_exists($obj_controller, $method)){
					$obj_controller->$method($this->params); //se tudo estiver correto, executa o controller e envia os parâmetros da URL.
				}
				else{
					die('Método do Controller não existe!');
				}
			}
			else{
				die('Classe do Controller não existe!');
			}
		}else{
			die('Controller não existe!');
		}
	}
}
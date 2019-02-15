<?php

namespace App\Models;
use app\functions\Connection;

class Model{
	public function all(){
		$class_name = str_replace(__NAMESPACE__ . '\\', '', get_called_class());



		$con = new Connection;

		$con->make();

		return $con->getAll($class_name);
	}

	public function first(){
		$class_name = str_replace(__NAMESPACE__ . '\\', '', get_called_class());

		$con = new Connection;

		$con->make();
		
		$all = $con->getAll($class_name);

		return $all[0];
	}

	public function find($id){
		$class_name = str_replace(__NAMESPACE__ . '\\', '', get_called_class());

		$con = new Connection;

		$con->make();
		
		$all = $con->getAll($class_name);

		$retorno = '';

		foreach($all as $value){
			if($value->id == $id){
				$retorno = $value;
			}
		}
		return (object) $retorno;
	}
	public function where($campo, $valor){
		$class_name = str_replace(__NAMESPACE__ . '\\', '', get_called_class());

		$con = new Connection;

		$con->make();
		
		$all = $con->getAll($class_name);

		$retorno = '';

		foreach($all as $value){
			if($value[$campo] == $valor){
				$retorno = $value;
			}
		}
		return (object) $retorno;
	}

	public function exists($campo, $valor){

		$class_name = str_replace(__NAMESPACE__ . '\\', '', get_called_class());

		$con = new Connection;

		$con->make();
		
		$all = $con->getAll($class_name);

		$retorno = '';

		foreach($all as $value){
			if($value[$campo] == $valor){
				$retorno = $value;
			}
		}
		return $retorno ? true : false;
	}
}
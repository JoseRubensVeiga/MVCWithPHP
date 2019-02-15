<?php

namespace App\Routes;

class GetRoutes{
	public static function get(){
		include('Routes.php');
		return (object)$rotas;
	}
}
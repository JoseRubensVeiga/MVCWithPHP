<?php
use App\Functions\View;
use App\Functions\Controller;

class HomeController {
	public function index($params){
		extract($params);

		View::to('welcome');
	}
}
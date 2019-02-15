<?php
use App\Functions\View;
use App\Functions\Controller;

class UserController extends Controller{
	public function index($params_url){
		extract($params_url);

		View::to('home', ['id' => $id, 'message' => $message]);
	}
}
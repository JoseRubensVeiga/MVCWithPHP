<?php

$rotas = [

	"login" => [
		"LoginController@index" => []
	],

	"home/index" => [
		"HomeController@index" => ['nome', 'id']
	],

	"user/edit" => [
		"UserController@edit" => ['login', 'message']
	],

	"user" => [
		"UserController@index" => ['id', 'message']
	],

	"admin/create" => [
		"AdminController@create" => ['id', 'message', 'action']
	],

	"admin" => [
		"AdminController@index" => []
	],

	"home" => [
		"HomeController@index" => []
	],


];

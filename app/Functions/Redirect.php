<?php

namespace App\Functions;

class Redirect{
	public function to($view){
		header("Location: ./$view");
	}
}
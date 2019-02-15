<?php

namespace App\Functions;

class View{
	public function to($view){
		$params = func_get_args();
		unset($params[0]);
		if(isset(array_values($params)[0])){
			if(! is_null(array_values($params)[0])){
				extract(array_values($params)[0]);	
			}	
		}
		session_start();
		if(isset($_SESSION['login'])){
			if($_SESSION['login'] == true){
				require __DIR__ . '/../Views/parts/head.php';
				require __DIR__ . '/../Views/parts/navbar.php';
				if(file_exists(__DIR__ . '/../Views/' . $view . '.php'))
					require __DIR__ . '/../Views/' . $view . '.php';
				else
					die("View '$view' não existe");

				require __DIR__ . '/../Views/parts/endnavbar.php';
				require __DIR__ . '/../Views/parts/footer.php';
			}else{
				$view = 'login';
				require __DIR__ . '/../Views/parts/head.php';
				if(file_exists(__DIR__ . '/../Views/' . $view . '.php'))
					require __DIR__ . '/../Views/' . $view . '.php';
				else
					die("View '$view' não existe");

				require __DIR__ . '/../Views/parts/footer.php';
			}
		}else{
			$view = 'login';
			require __DIR__ . '/../Views/parts/head.php';
			if(file_exists(__DIR__ . '/../Views/' . $view . '.php'))
				require __DIR__ . '/../Views/' . $view . '.php';
			else
				die("View '$view' não existe");
			require __DIR__ . '/../Views/parts/footer.php';

		}


		
			
	}
}
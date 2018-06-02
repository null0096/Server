<?php
	class Route {
		static function start() {
			$routes				= explode('/', $_SERVER['REQUEST_URI']);
			$controller_name 	= empty($routes[1]) || $routes[1] == "" ? 'show'  : strtolower($routes[1]);
			$action_name		= empty($routes[2]) || $routes[2] == "" ? 'index' : strtolower($routes[2]);

			// connection module
			$model_path = "application/models/Model_".$controller_name.'.php';
			if( file_exists($model_path) ) {
				include $model_path;
			}

			// connection controller
			$controller_class_name 	= "Controller_".$controller_name;
			$controller_path = "application/controllers/".$controller_class_name.".php";
			if( file_exists($controller_path) ) {
				include $controller_path;
			} else {
				Route::ErrorPage404();
				return;
			}

			$controller 	= new $controller_class_name();
			$action_name 	= 'action_'.$action_name;
			if ( method_exists($controller, $action_name) ) {
				$controller->$action_name();
			} else {
				Route::ErrorPage404();
			}
		}
		
		static function ErrorPage404() {
			(new View())->generate("404_view.php");
		}
	}
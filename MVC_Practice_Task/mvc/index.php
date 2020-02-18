<?php
	require_once '../vendor/autoload.php';

	error_reporting(E_ALL);
	set_error_handler('Core\Error::errorHandler');
	set_exception_handler('Core\Error::exceptionHandler');
	
	$router = new Core\Router();

	$router->add('',['controller' => 'Home', 'action' => 'index']);
	$router->add('{controller}/{action}');
	$router->add('{controller}/products/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}',['namespace' => 'Admin']);
	$router->add('admin/cms/{controller}/{action}',['namespace' => 'Admin\cms']);
	
	$router->dispatch($_SERVER['QUERY_STRING']);
?>
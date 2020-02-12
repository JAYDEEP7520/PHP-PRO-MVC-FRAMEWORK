<?php
	require_once dirname(__DIR__) . '/Vendor/autoload.php';
	
	spl_autoload_register(function ($class) {
		$root = dirname(__DIR__); // get parent directory path
		$file = $root . '/' . str_replace('\\','/',$class) . '.php';
		if (is_readable($file)) {
			require $root . '/' . str_replace('\\','/',$class) . '.php';
		}
	});
	
	$router = new Core\Router();
//	$url = $_SERVER['QUERY_STRING'];

	$router->add('',['controller' => 'Home', 'action' => 'index']);
//	$router->add('posts',['controller' => 'Posts', 'action' => 'index']);
//	$router->add('posts/new',['controller' => 'Posts', 'action' => 'new']);
	$router->add('{controller}/{action}');
//	$router->add('admin/{action}/{controller}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}',['namespace' => 'Admin']);
	
	/* echo '<pre>';
	 var_dump($router->getRoutes());
	 echo '</pre>'; 

	 if ($router->match($url)) {
		echo '<pre>';
		var_dump($router->getParams());
		echo '</pre>';
	 }
	 else {
		 echo "No Route found from url: $url";
	 } */
	 $router->dispatch($_SERVER['QUERY_STRING']);
?>
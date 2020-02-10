<?php
	require '../Core/Router.php';
	
	$router = new Router();
	$url = $_SERVER['QUERY_STRING'];

	$router->add('',['controller' => 'Home', 'action' => 'index']);
	$router->add('posts',['controller' => 'Posts', 'action' => 'index']);
	$router->add('posts/new',['controller' => 'Posts', 'action' => 'new']);
	$router->add('{controller}/{action}');
	$router->add('admin/{action}/{controller}');
	$router->add('{controller}/{id:\d+}/{action}');
	
	 echo '<pre>';
	 var_dump($router->getRoutes());
	 echo '</pre>'; 

	 if ($router->match($url)) {
		echo '<pre>';
		var_dump($router->getParams());
		echo '</pre>';
	 }
	 else {
		 echo "No Route found from url: $url";
	 }
?>
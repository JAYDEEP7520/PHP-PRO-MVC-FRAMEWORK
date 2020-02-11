<?php
	require '../Core/Router.php';
	$router = new Router();
	
	$router->add('',['controller' => 'Home', 'action' => 'index']);
	$router->add('posts',['controller' => 'Posts', 'action' => 'index']);
	$router->add('posts/new',['controller' => 'Posts', 'action' => 'new']);

	// Displaying Routing Table 
	 echo '<pre>';
	 var_dump($router->getRoutes());
	 echo '</pre>'; 
	
	$url = $_SERVER['QUERY_STRING'];
	
	if ($router->match($url)) {
		echo '<pre>';
		var_dump($router->getParams());
		echo '</pre>';
	 }
	 else {
		 echo "No Route found from url: $url";
	 } 	
?>
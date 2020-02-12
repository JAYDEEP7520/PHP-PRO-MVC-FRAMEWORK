<?php
    namespace App\Controllers;

    use \Core\View;
    
    class Posts extends \Core\Controller
    {
        public function indexAction() 
        {
            echo "Hello from the index action in posts controller <br>";
   
            View::renderTemplate('Posts/index.html');
        }
        public function addNewAction() 
        {
            echo "Hello from the addNew action in posts controller"; 
        }
        public function editAction() 
        {
            echo "Hello from the edit action in posts controller <br>";
            echo "Route Parameters: <pre>" . htmlspecialchars(print_r($this->route_params, true)) . "</pre>";
        }
    }
?>
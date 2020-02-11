<?php
    namespace App\Controllers;
    
    class Home extends \Core\Controller
    {
        public function indexAction() 
        {
            echo "Hello from the index action in Home controller";
        }
        protected function before()
        {
            echo "(before)";
            return false;
        }
        protected function after()
        {
            echo "(after)";
        }
    }
?>
<?php
    namespace App\Controllers;

    use \Core\View;
    
    class Home extends \Core\Controller
    {
        protected function before()
        {

        }
        public function indexAction() 
        {
            echo "Hello from the index action in Home controller";
    
            View::renderTemplate('Home/index.html', [
                    'name' => 'JAYDEEP. A. PANDYA',
                    'property' => ['Age: 21', 'Role: Trainee', 'Qualification: B. E. CSE']
            ]);

        }
        protected function after()
        {

        }
    }
?>
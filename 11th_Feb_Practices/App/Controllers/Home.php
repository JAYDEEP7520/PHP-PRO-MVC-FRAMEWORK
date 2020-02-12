<?php
    namespace App\Controllers;

    use \Core\View;
    
    class Home extends \Core\Controller
    {
        protected function before()
        {
        //     echo "(before)";
        //     return false;
        }
        public function indexAction() 
        {
            echo "Hello from the index action in Home controller";
            // View::render('Home/index.php', [
            //     'name' => 'JAYDEEP. A. PANDYA',
            //     'property' => ['Age: 21', 'Role: Trainee', 'Qualification: B. E. CSE']
            // ]);
            View::renderTemplate('Home/index.html', [
                    'name' => 'JAYDEEP. A. PANDYA',
                    'property' => ['Age: 21', 'Role: Trainee', 'Qualification: B. E. CSE']
            ]);

        }
        protected function after()
        {
            // echo "(after)";
        }
    }
?>
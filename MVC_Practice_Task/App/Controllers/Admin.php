<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Config;
    use \App\Models\GetProducts;

    class Admin extends \Core\Controller
    {
        protected function before()
        {

        }
        public function loginAction() 
        {
            View::renderTemplate('Admin/index.html', []);
        }
        public function dashboard()
        {
            if ($_POST['email'] == Config::USER_EMAIL && $_POST['password'] == Config::USER_PASSWORD)
                View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL]);
            else { 
                View::renderTemplate('Admin/index.html',  []); 
                echo "<p align=center> Invalid Email & Password </p>";
            }
        }
        public function products()
        {
            if (isset($_POST['productname']) && !empty($_POST['productname']) &&
                isset($_POST['productsku']) && !empty($_POST['productsku']) &&
                isset($_POST['productimage']) && !empty($_POST['productimage']) &&
                isset($_POST['productstatus']) && !empty($_POST['productstatus']) &&
                isset($_POST['productdiscription']) && !empty($_POST['productdiscription']) &&
                isset($_POST['productshortdiscription']) && !empty($_POST['productshortdiscription']) &&
                isset($_POST['productprice']) && !empty($_POST['productprice']) &&
                isset($_POST['productstock']) && !empty($_POST['productstock'])) {
                    // View::renderTemplate('Admin/index.html',  []); 
                }
            $product = GetProducts::getProducts();
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Products' => $product]);
        }
        public function add()
        {
            View::renderTemplate('Admin/AddProduct.html',  []); 
        }
        protected function after()
        {
           
        }
    }
?>
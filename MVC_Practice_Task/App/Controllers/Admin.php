<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Config;
    use \App\Models\GetProducts;
    use \App\Models\InsertProducts;
    use \App\Models\UpdateProducts;

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
            if (isset($_POST['productname'])) {
            $productname = $_POST['productname'];
            $productsku = $_POST['productsku'];
            $urlkey = str_replace([" ", "&"], ["-", "%20"], strtolower($_POST['productname']));
            $productimage = $_POST['productimage'];
            $productstatus = $_POST['productstatus'];
            $productdescription = $_POST['productdiscription'];
            $productshortdescription = $_POST['productshortdescription'];
            $productprice = $_POST['productprice'];
            $productstock = $_POST['productstock'];
            $createdat = date("Y/m/d h:i:sa");
            $updatedat = date("Y/m/d h:i:sa");
            
            InsertProducts::insertProducts($productname, $productsku, $urlkey, $productimage, $productstatus, 
                                            $productdescription, $productshortdescription, $productprice,
                                            $productstock, $createdat, $updatedat);
            }
            else {

           

                $product = UpdateProducts::updateProducts($id, $productname, $productsku, $urlkey, $productimage, 
                                                        $productstatus, $productdescription, 
                                                        $productshortdescription, $productprice, $productstock, 
                                                        $createdat, $updatedat);
                View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Products' => $product]);    
            }
            $product = GetProducts::getProducts();
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Products' => $product]);
        }
        public function add()
        {
            $view = "add";
            View::renderTemplate('Admin/AddProduct.html',  ['view' => $view]); 
        }
        public function edit()
        {
            $view = "edit";

            $id = $_GET['id'];
            $product = GetProducts::getOnProductId($id);
            View::renderTemplate('Admin/AddProduct.html', ['product' => $product[0], 'view' => $view]);
        }
        protected function after()
        {
           
        }
    }
?>
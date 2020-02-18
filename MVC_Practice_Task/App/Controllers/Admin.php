<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Config;
    use \App\Models\GetProducts;
    use \App\Models\InsertProducts;
    use \App\Models\UpdateProducts;
    use \App\Models\DeleteProducts;

    use \App\Models\GetCategories;
    use \App\Models\InsertCategories;
    use \App\Models\UpdateCategories;

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

            if (isset($_POST['submit_add'])) {
                
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
            if (isset($_POST['submit_update'])) {

            $id = $_GET['id'];

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
            
            UpdateProducts::updateProducts($id,$productname, $productsku, $urlkey, $productimage, $productstatus, 
                                            $productdescription, $productshortdescription, $productprice,
                                            $productstock, $createdat, $updatedat);
                
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
        public function delete()
        {
            $id = $_GET['id'];
            $product = DeleteProducts::deleteProducts($id);
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL]);
        }
        public function categories()
        {
            if (isset($_POST['submit_add_category'])) {
                
                $categoryname = $_POST['categoryname'];
                $categoryimage = $_POST['categoryimage'];
                $categoryurlkey = str_replace([" ", "&"], ["-", "%20"], strtolower($_POST['categoryname']));
                $categorystatus = $_POST['categorystatus'];
                $categorydescription = $_POST['categorydiscription'];
                $categoryparentcategory = $_POST['categoryparentcategory'];
                $createdat = date("Y/m/d h:i:sa");
                $updatedat = date("Y/m/d h:i:sa");
                
                InsertCategories::insertCategories($categoryname, $categoryurlkey, $categoryimage, $categorystatus, 
                                                $categorydescription, $categoryparentcategory, $createdat, $updatedat);
                }
            
                if (isset($_POST['submit_update_category'])) {

                    $id = $_GET['id'];
        
                    $categoryname = $_POST['categoryname'];
                    $categoryimage = $_POST['categoryimage'];
                    $categoryurlkey = str_replace([" ", "&"], ["-", "%20"], strtolower($_POST['categoryname']));
                    $categorystatus = $_POST['categorystatus'];
                    $categorydescription = $_POST['categorydiscription'];
                    $categoryparentcategory = $_POST['categoryparentcategory'];
                    $createdat = date("Y/m/d h:i:sa");
                    $updatedat = date("Y/m/d h:i:sa");
                    
                    UpdateCategories::updateCategories($id,$categoryname, $categoryurlkey, $categoryimage, $categorystatus, 
                                                $categorydescription, $categoryparentcategory, $createdat, $updatedat);
                        
                    }
            $categories = GetCategories::getCategories();
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Categories' => $categories]);
        }
        protected function after()
        {
           
        }
    }
?>
<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Config;

    use \App\Models\GetProducts;
    use \App\Models\GetCategories;

    class Product extends \Core\Controller
    {
        public function view()
        {
            $view = 'view';
            $urlkey = 'urlkey';
            $url_parts = explode('/',$_SERVER['QUERY_STRING']);
            echo $url_key = end($url_parts);
            print_r($products_ = GetProducts::getProductsUrlKeyOnUrlKey($url_key));
            die();
            $parentcategory = GetCategories::getParentCategory();
            $childcategory = GetCategories::getChildCategory($parentcategory);
            View::renderTemplate('Home/index.html', ['parentcategory' => $parentcategory,
                                                    'childcategory' => $childcategory, 
                                                    'products_' => $products_, 'view' => $view,
                                                    'urlkey' => $urlkey]);
        }
    }
?>
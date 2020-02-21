<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Config;

    use \App\Models\GetProducts;
    use \App\Models\GetCategories;

    class Category extends \Core\Controller
    {
        public function view()
        {
            $view = 'view';
            $url_parts = explode('/',$_SERVER['QUERY_STRING']);
            $url_key = end($url_parts);
            $products = GetProducts::getProductsOnUrlKey($url_key);
            $parentcategory = GetCategories::getParentCategory();
            $childcategory = GetCategories::getChildCategory($parentcategory);
            View::renderTemplate('Home/index.html', ['parentcategory' => $parentcategory,
                                                    'childcategory' => $childcategory, 
                                                    'products' => $products, 'view' => $view]);
        }
    }
?>
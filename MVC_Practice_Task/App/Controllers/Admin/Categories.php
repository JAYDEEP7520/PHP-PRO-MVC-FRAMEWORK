<?php
    namespace App\Controllers\Admin;

    use \Core\View;
    use \App\Config;

    use \App\Models\GetCategories;
    use \App\Models\DeleteCategories;

    class Categories extends \Core\Controller
    {
        public function add()
        {
            $view = "add";
            View::renderTemplate('Admin/AddCategories.html',  ['view' => $view]); 
        }
        public function edit()
        {
            $view = "edit";

            $id = $_GET['id'];
            $categories = GetCategories::getOnCategoryId($id);
            View::renderTemplate('Admin/AddCategories.html', ['categories' => $categories[0], 'view' => $view]);
        }
        public function delete()
        {
            $id = $_GET['id'];
            $categories = DeleteCategories::deleteCategories($id);
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL]);
        }
    }
?>
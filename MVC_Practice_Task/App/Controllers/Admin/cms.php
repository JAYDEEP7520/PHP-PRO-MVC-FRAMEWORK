<?php
    namespace App\Controllers\Admin;

    use \Core\View;
    use \App\Config;

    use \App\Models\GetCmsPages;

    class cms extends \Core\Controller
    {
        public function pages()
        {
            $cmspages = GetCmsPages::getCmsPages();
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Cmspages' => $cmspages]);
        }
    }
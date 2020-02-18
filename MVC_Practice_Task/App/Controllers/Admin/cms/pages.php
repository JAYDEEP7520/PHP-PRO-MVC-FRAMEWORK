<?php
    namespace App\Controllers\Admin\cms;

    use \Core\View;
    use \App\Config;

    use \App\Models\InsertCmsPages;

    class pages extends \Core\Controller
    {
        public function add()
        {
            $view = "add";
            View::renderTemplate('Admin/AddNewCmsPages.html',  ['view' => $view]); 

            if ($_POST['submit_add_cmspages']) {

                $cmspagetitle = $_POST['cmspagetitle'];
                $cmspageurlkey = str_replace([" ", "&"], ["-", "%20"], strtolower($_POST['cmspagetitle']));
                $cmspagestatus = $_POST['cmspagestatus'];
                $cmspagecontent = $_POST['cmspagecontent'];
                $createdat = date("Y/m/d h:i:sa");
                $updatedat = date("Y/m/d h:i:sa");
                
                InsertCmsPages::insertCmsPages($cmspagetitle, $cmspageurlkey, $cmspagestatus, $cmspagecontent, 
                                                    $createdat, $updatedat);
                $cmspages = GetCmsPages::getCmsPages();
                View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Cmspages' => $cmspages]);

            }
        }
    }
<?php
    namespace App\Controllers\Admin\cms;

    use \Core\View;
    use \App\Config;

    use \App\Models\InsertCmsPages;
    use \App\Models\GetCmsPages;
    use \App\Models\UpdateCmsPages;
    use \App\Models\DeleteCmsPages;

    class pages extends \Core\Controller
    {
        public function add()
        {
            if (isset($_POST['submit_add_cmspages'])) {

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
            } else {
                $view = "add";
                View::renderTemplate('Admin/AddNewCmsPages.html',  ['view' => $view]);
            }
        }
        public function edit()
        {
            if (isset($_POST['submit_update_cmspages'])) {

                $id = $_GET['id'];

                $cmspagetitle = $_POST['cmspagetitle'];
                $cmspageurlkey = str_replace([" ", "&"], ["-", "%20"], strtolower($_POST['cmspagetitle']));
                $cmspagestatus = $_POST['cmspagestatus'];
                $cmspagecontent = $_POST['cmspagecontent'];
                $createdat = date("Y/m/d h:i:sa");
                $updatedat = date("Y/m/d h:i:sa");
                
                UpdateCmsPages::updateCmsPages($id,$cmspagetitle, $cmspageurlkey, $cmspagestatus, $cmspagecontent, 
                                            $createdat, $updatedat);

                $cmspages = GetCmsPages::getCmsPages();
                View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Cmspages' => $cmspages]);
                
            } else {

                $view = "edit";
                
                $id = $_GET['id'];
                $cmspages = GetCmsPages::getCmsPagesOnId($id);
                View::renderTemplate('Admin/AddNewCmsPages.html', ['cmspages' => $cmspages[0], 'view' => $view]);
            }
        }
        public function delete()
        {
            $id = $_GET['id'];
            $cmspages = DeleteCmsPages::deleteCmsPages($id);
            View::renderTemplate('Admin/dashboard.html', ['name' => Config::USER_EMAIL, 'Cmspages' => $cmspages]);
        }
    }
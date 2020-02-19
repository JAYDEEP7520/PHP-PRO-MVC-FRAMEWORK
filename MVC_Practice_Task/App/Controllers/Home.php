<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Models\GetCmsPages;
    use \App\Models\GetCategories;
    
    class Home extends \Core\Controller
    {
        protected function before()
        {

        }
        public function indexAction() 
        {
            $cmspageurlkey = "Home";
            $cmspagecontent = GetCmsPages::getCmsPageContentOnUrlKey($cmspageurlkey);
            $parentcategory = GetCategories::getParentCategory();
            View::renderTemplate('Home/index.html', ['cmspagecontent' => $cmspagecontent, 
                                                    'cmspageurlkey' => $cmspageurlkey, 
                                                    'parentcategory' => $parentcategory]);
        }
        public function aboutusAction()
        {
            $aboutuspageurlkey = "About-Us";
            $aboutuscontent = GetCmsPages::getAboutUsPage($aboutuspageurlkey);
            $parentcategory = GetCategories::getParentCategory();
            View::renderTemplate('Home/index.html', ['aboutuscontent' => $aboutuscontent[0], 
                                                    'aboutuspageurlkey' => $aboutuspageurlkey, 
                                                    'parentcategory' => $parentcategory]);
        }
        public function contactusAction()
        {
            $contactuspageurlkey = "Contact-Us";
            $contactuscontent = GetCmsPages::getContactUsPage($contactuspageurlkey);
            $parentcategory = GetCategories::getParentCategory();
            View::renderTemplate('Home/index.html', ['contactuscontent' => $contactuscontent[0], 
                                                    'contactuspageurlkey' => $contactuspageurlkey, 
                                                    'parentcategory' => $parentcategory]);
        }
        protected function after()
        {
           
        }
    }
?>
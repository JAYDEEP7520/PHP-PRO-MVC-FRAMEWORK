<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin\cms;

    class InsertCmsPages extends \Core\Model
    {
        public static function insertCmsPages($cmspagetitle, $cmspageurlkey, $cmspagestatus, $cmspagecontent, 
                                                $createdat, $updatedat)
        {
            try { 
                $conn = static::getDB();
                $insert = "INSERT INTO `cms_pages`(`Page_Title`, `Url_Key`, `Status`, `Content`, `Created_At`, 
                                                    `Updated_At`) VALUES (?,?,?,?,?,?)";
                $conn->prepare($insert)->execute([$cmspagetitle, $cmspageurlkey, $cmspagestatus, $cmspagecontent, 
                                                $createdat, $updatedat]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin\cms;

    class UpdateCmsPages extends \Core\Model
    {
        public static function updateCmsPages($id,$cmspagetitle, $cmspageurlkey, $cmspagestatus, $cmspagecontent, 
                                            $createdat, $updatedat)
        {
            try { 
                $conn = static::getDB();
                $update = "UPDATE `cms_pages` SET `ID`=$id,`Page_Title`=?,`Url_Key`=?,`Status`=?,`Content`=?,
                                                    `Created_At`=?,`Updated_At`=? WHERE `ID`=$id";
                $conn->prepare($update)->execute([$cmspagetitle, $cmspageurlkey, $cmspagestatus, $cmspagecontent, 
                                                $createdat, $updatedat]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin;

    class UpdateCategories extends \Core\Model
    {
        public static function updateCategories($id,$categoryname, $categoryurlkey, $categoryimage, $categorystatus, 
                                                $categorydescription, $categoryparentcategory, $createdat, $updatedat)
        {
            try { 
                $conn = static::getDB();
                $update = "UPDATE `categories` SET `ID`=$id,`Category_Name`=?, `Url_Key`=?,`Image`=?, 
                                                    `Status`=?,`Description`=?,`Parent_Category`=?,
                                                    `Created_At`=?,`Updated_At`=? WHERE `ID`=$id";
                $conn->prepare($update)->execute([$categoryname, $categoryurlkey, $categoryimage, $categorystatus, 
                                            $categorydescription, $categoryparentcategory, $createdat, $updatedat]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
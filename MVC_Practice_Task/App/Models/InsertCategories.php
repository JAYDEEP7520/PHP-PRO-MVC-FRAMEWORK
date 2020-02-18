<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin;

    class InsertCategories extends \Core\Model
    {
        public static function insertCategories($categoryname, $categoryurlkey, $categoryimage, $categorystatus, 
                                        $categorydescription, $categoryparentcategory, $createdat, $updatedat)
        {
            try { 
                $conn = static::getDB();
                $insert = "INSERT INTO `categories`(`Category_Name`, `Url_Key`, `Image`, `Status`,`Description`, 
                                                    `Parent_Category`, `Created_At`, `Updated_At`) 
                                VALUES (?,?,?,?,?,?,?,?)";
                $conn->prepare($insert)->execute([$categoryname, $categoryurlkey, $categoryimage, 
                                                $categorystatus, $categorydescription, $categoryparentcategory, 
                                                $createdat, $updatedat]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
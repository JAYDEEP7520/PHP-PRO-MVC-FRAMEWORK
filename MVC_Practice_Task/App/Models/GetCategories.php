<?php
    namespace App\Models;

    use PDO;

    class GetCategories extends \Core\Model
    {
        public static function getCategories()
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Category_Name`, `Url_Key`, `Image`, `Status`, 
                                            `Description`, `Parent_Category`, `Created_At`, `Updated_At` 
                                            FROM `categories`");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getOnCategoryId($id)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Category_Name`, `Url_Key`, `Image`, `Status`, 
                                        `Description`, `Parent_Category`, `Created_At`, `Updated_At` 
                                        FROM `categories` WHERE `ID`=$id");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getParentCategory()
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Parent_Category` FROM `categories`");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
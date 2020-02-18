<?php
    namespace App\Models;

    use PDO;

    class GetCmsPages extends \Core\Model
    {
        public static function getCmsPages()
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Page_Title`, `Url_Key`, `Status`, `Content`, 
                                         `Created_At`, `Updated_At` FROM `cms_pages`");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getOnProductId($id)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Product_Name`, `SKU`, `Url_Key`, `Image`, `Status`, 
                                            `Description`, `Short_Description`, `Price`, `Stock`, 
                                            `Created_At`, `Updated_At` FROM `products` WHERE `ID`=$id");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
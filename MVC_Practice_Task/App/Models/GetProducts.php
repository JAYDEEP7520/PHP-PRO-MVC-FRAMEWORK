<?php
    namespace App\Models;

    use PDO;

    class GetProducts extends \Core\Model
    {
        public static function getProducts()
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Product_Name`, `SKU`, `Url_Key`, `Image`, `Status`, 
                                            `Description`, `Short_Description`, `Price`, `Stock`, 
                                            `Created_At`, `Updated_At` FROM `products`");
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
        public static function getProductsOnUrlKey($url_key)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Product_Name`, `Url_Key`, `Image`, `Description`, `Price`, `Stock` 
                                                    FROM `products` WHERE `Short_Description` = '$url_key'");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getProductsUrlKeyOnUrlKey($url_key)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Product_Name`, `Url_Key`,`Image`, `Description`, `Price`, `Stock` 
                                                    FROM `products` WHERE `Url_Key` = '$url_key'");
                print_r($result = $statement->fetchAll(PDO::FETCH_ASSOC));
                return $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
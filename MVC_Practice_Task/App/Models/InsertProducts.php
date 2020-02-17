<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin;

    class InsertProducts extends \Core\Model
    {
        public static function insertProducts($productname, $productsku, $urlkey, $productimage, $productstatus, 
                                            $productdescription, $productshortdescription, $productprice,
                                            $productstock, $createdat, $updatedat)
        {
            try { 
                $conn = static::getDB();
                $insert = "INSERT INTO `products`(`Product_Name`, `SKU`, `Url_Key`, `Image`, `Status`, 
                                                `Description`, `Short_Description`, `Price`, `Stock`, 
                                                `Created_At`, `Updated_At`) 
                                        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $conn->prepare($insert)->execute([$productname, $productsku, $urlkey, $productimage, 
                                                $productstatus, $productdescription, $productshortdescription, 
                                                $productprice, $productstock, $createdat, $updatedat]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
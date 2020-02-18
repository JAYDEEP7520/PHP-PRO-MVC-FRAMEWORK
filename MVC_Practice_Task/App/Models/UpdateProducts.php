<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin;

    class UpdateProducts extends \Core\Model
    {
        public static function updateProducts($id,$productname, $productsku, $urlkey, $productimage_, 
                                            $productstatus, $productdescription, $productshortdescription, 
                                            $productprice, $productstock, $createdat, $updatedat)
        {
            try { 
                $conn = static::getDB();
                $update = "UPDATE `products` SET `ID`=$id,`Product_Name`=?,`SKU`=?,`Url_Key`=?,`Image`=?,
                        `Status`=?,`Description`=?,`Short_Description`=?, `Price`=?,`Stock`=?,`Created_At`=?,
                        `Updated_At`=? WHERE `ID`=$id";
                $conn->prepare($update)->execute([$productname, $productsku, $urlkey, $productimage_, 
                                                $productstatus, $productdescription, $productshortdescription, 
                                                $productprice, $productstock, $createdat, $updatedat]);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin;

    class DeleteProducts extends \Core\Model
    {
        public static function deleteProducts($id)
        {
            try { 
                $conn = static::getDB();
                $delete = "DELETE FROM `products` WHERE `ID`=$id";
                $conn->prepare($delete)->execute();
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
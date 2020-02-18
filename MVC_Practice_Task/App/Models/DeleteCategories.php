<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin;

    class DeleteCategories extends \Core\Model
    {
        public static function deleteCategories($id)
        {
            try { 
                $conn = static::getDB();
                $delete = "DELETE FROM `categories` WHERE `ID`=$id";
                $conn->prepare($delete)->execute();
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
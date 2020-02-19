<?php
    namespace App\Models;

    use PDO;
    use App\Controllers\Admin\cms;

    class DeleteCmsPages extends \Core\Model
    {
        public static function deleteCmsPages($id)
        {
            try { 
                $conn = static::getDB();
                $delete = "DELETE FROM `cms_pages` WHERE `ID`=$id";
                $conn->prepare($delete)->execute();
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
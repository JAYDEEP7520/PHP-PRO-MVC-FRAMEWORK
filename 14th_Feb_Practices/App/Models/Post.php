<?php
    namespace App\Models;

    use PDO;

    class Post extends \Core\Model
    {
        public static function getAll()
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Title`, `Content` FROM `posts` ORDER BY `Created_At`");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
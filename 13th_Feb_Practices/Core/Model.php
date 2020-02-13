<?php
    namespace Core;

    use PDO;
    
    abstract class Model 
    {
        protected static function getDB()
        {
            static $conn = null;

            if ($conn === null) {
                try {
                    $conn = new PDO("mysql:host=localhost; dbname=mvc; charset=utf8", "root");
                    return  $conn;
                }
                catch(PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
?>
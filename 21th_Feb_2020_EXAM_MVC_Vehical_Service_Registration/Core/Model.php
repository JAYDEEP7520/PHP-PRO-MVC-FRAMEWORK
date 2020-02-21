<?php
    namespace Core;

    use PDO;
    use App\Config;
    
    abstract class Model 
    {
        protected static function getDB()
        {
            static $conn = null;

            if ($conn === null) {
                try {
                    $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                    $conn = new PDO($dsn, Config::DB_USER);

                    // Throw an exception when errors occurs..
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                    return  $conn;
                }
                catch(PDOException $e) {
                    echo $e->getMessage();
                }
            } else {
                return $conn;
            }
        }
    }
?>
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
        public static function getCmsPagesOnId($id)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `ID`, `Page_Title`, `Url_Key`, `Status`, `Content`, 
                                        `Created_At`, `Updated_At` FROM `cms_pages` WHERE `ID`=$id");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getCmsPageContentOnUrlKey($cmspageurlkey)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Content` FROM `cms_pages` WHERE `Url_Key`='$cmspageurlkey'");
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getAboutUsPage($aboutuspageurlkey)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Content` FROM `cms_pages` WHERE `Url_Key`='$aboutuspageurlkey'");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getContactUsPage($contactuspageurlkey)
        {
            try {
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Content` FROM `cms_pages` WHERE `Url_Key`='$contactuspageurlkey'");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
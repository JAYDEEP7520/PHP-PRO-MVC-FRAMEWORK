<?php
    namespace App\Models;

    use PDO;
    use App\Controllers;

    class RegistrationModel extends \Core\Model
    {
        public static function insertUsersData($firstname, $lastname, $email, $password, $phonenumber)
        {
            try { 
                $conn = static::getDB();
                $insert = "INSERT INTO `users`(`Firstname`, `Lastname`, `Email`, `Password`, `Phone_Number`) 
                                        VALUES (?,?,?,?,?)";
                $conn->prepare($insert)->execute([$firstname, $lastname, $email, $password, $phonenumber]);

                $statement = $conn->query("SELECT `User_Id` FROM `users`");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;

                return true;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public static function insertAddressData($userid, $street, $city, $state, $zipcode, $country)
        {
            try { 
                $conn = static::getDB();
                $insert = "INSERT INTO `user_addresses`(`User_Id`, `Street`, `City`, `State`, `Zipcode`, `Country`) 
                                        VALUES (?,?,?,?,?,?)";
                $conn->prepare($insert)->execute([$userid,$street, $city, $state, $zipcode, $country]);

                return true;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function checkUsersData($userid, $email, $password)
        {
            try { 
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Email`, `Password` FROM `users` WHERE `User_Id` = '$userid'");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;

                return true;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public static function getServicesIdsData($timeslot)
        {
            try { 
                $conn = static::getDB();
                $statement = $conn->query("SELECT `Service_Id`, `User_Id` FROM `service_registrations` 
                                                                          WHERE `Timeslot` = $timeslot");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function insertVehicalServiceData($userid, $title, $vehicalnumber, $licencenumber, 
                                                         $date, $timeslotdata, $issue, $servicecenter)
        {
            try { 
                $conn = static::getDB();
                $insert = "INSERT INTO `service_registrations`(`User_Id`, `Title`, `Vehical_Number`, 
                                                              `User_Licence_Number`, `Date`, `Timeslot`, 
                                                              `Vehical_Issue`, `Service_Center`) 
                                    VALUES (?,?,?,?,?,?,?,?)";
                $conn->prepare($insert)->execute([$userid, $title, $vehicalnumber, $licencenumber, 
                                                  $date, $timeslotdata, $issue, $servicecenter]);

                return true;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
        public static function getVehicalServiceData()
        {
            try { 
                $conn = static::getDB();
                $statement = $conn->query("SELECT * FROM `service_registrations`");
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return  $result;
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>
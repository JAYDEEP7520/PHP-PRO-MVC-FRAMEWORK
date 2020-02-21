<?php
    namespace App\Controllers;

    use \Core\View;
    use \App\Models\RegistrationModel;
    
    class Home extends \Core\Controller
    {
        protected function before()
        {

        }
        public function indexAction() 
        {
            if (isset($_POST['registration'])) {
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phonenumber = $_POST['phonenumber'];
                $street = $_POST['street'];
                $city = $_POST['city'];
                $state = $_POST['state'];
                $zipcode = $_POST['zipcode'];
                $country = $_POST['country'];

                $resultuseres = RegistrationModel::insertUsersData($firstname, $lastname, $email, $password, $phonenumber);
                $userid = $resultuseres[0]['User_Id'];
                $resultaddress = RegistrationModel::insertAddressData($userid,$street, $city, $state, $zipcode, $country);

                if ($resultuseres == true && $resultaddress == true) {
                    View::renderTemplate('Home/index.html',['userid' => $userid]);        
                }
                else {
                    View::renderTemplate('Home/registration.html',[]);
                }
            }
            else {
                View::renderTemplate('Home/index.html',[]);
            }
        }
        public function registrationAction() 
        {
            View::renderTemplate('Home/registration.html',[]);
        }
        public function loginAction()
        {
            $userid = $_GET['id'];
            if (isset($_POST['login'])) {

                $email = $_POST['email'];
                $password = $_POST['password'];

                $resultuser = RegistrationModel::checkUsersData($userid, $email, $password);

                if ($resultuser == true) {
                    if ($email == $resultuser[0]['Email'] && $password == $resultuser[0]['Password']) {
                        View::renderTemplate('Home/dashboard.html',['userid' => $userid]);
                    }
                    else {
                        View::renderTemplate('Home/index.html',[]);
                    }
                }
            }
            else {
                View::renderTemplate('Home/index.html',[]);
            }
        }
        public function registervehical()
        {
            $userid = $_GET['id'];
            View::renderTemplate('Home/registervehical.html',['userid' => $userid]);
        }
        public function registervehicalservice()
        {
            $userid = $_GET['id'];

            $title = $_POST['title'];
            $vehicalnumber = $_POST['vehicalnumber'];
            $licencenumber = $_POST['licencenumber'];
            $date = $_POST['datepicker'];
            $timeslot = $_POST['timeslot'];
            $issue = $_POST['issue'];
            $servicecenter = $_POST['servicecenter'];

            if (isset($_POST['registerservice'])) {

                $timeslotdata = RegistrationModel::getServicesIdsData($timeslot);

                if (count($timeslotdata) > 3) {
                    View::renderTemplate('Home/registervehical.html',['userid' => $userid]);
                }
                else {
                    $register = RegistrationModel::insertVehicalServiceData($userid, $title, $vehicalnumber,
                                                                            $licencenumber, $date, $timeslotdata, 
                                                                            $issue, $servicecenter);
                    if ($register == true) {

                        $vehcialservice = RegistrationModel::getVehicalServiceData();
                        $displaytable = "true";
                        View::renderTemplate('Home/registervehical.html',['userid' => $userid, 
                                                                          'vehcialservice' => $vehcialservice,
                                                                          'displaytable' => $displaytable]);
                    }
                }
            }
        }
        protected function after()
        {
           
        }
    }
?>
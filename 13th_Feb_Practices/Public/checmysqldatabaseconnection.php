<?php
    $conn = mysqli_connect("localhost", "root");
    if ($conn) {
        $database = mysqli_select_db($conn, "MVC");

        if (!$database) {
            echo mysqli_error();
        }
    }
    else {
        echo mysqli_error();
    }
?>
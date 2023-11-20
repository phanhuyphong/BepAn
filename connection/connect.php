<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kojifood";

    //Create connection
    $db = mysqli_connect("$servername","$username","$password","$dbname");

    //check connect
    if(!$db){
        die("Connection failed".mysqli_connect_error());
    }
?>
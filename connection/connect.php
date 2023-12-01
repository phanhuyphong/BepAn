<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kojifood";

    //Create connection
    $db = mysqli_connect("$servername","$username","$password","$dbname");
    mysqli_set_charset($db,'utf8');
    //check connect
    if(!$db){
        die("Connection failed".mysqli_connect_error());
    }
?>
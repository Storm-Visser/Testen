<?php
    $servername = "localhost";
    $password = "";
    $username = "root";
    $dbName = "gerecht";

    $conn = mysqli_connect($servername, $username, $password, $dbName);

    if(!$conn) 
    {
        die("Connection Failed");
    }
    ?>
<?php

    $servername = "localhost";
    $dBUsername = "root";
    $dBpassword = "";
    $dBname = "test2";

    $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    // $sql = 'SET GLOBAL time_zone = "+5:30"';
    // $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
    date_default_timezone_set("Asia/Colombo");

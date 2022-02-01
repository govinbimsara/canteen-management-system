<?php

    $servername = "localhost";
    $dBUsername = "root";
    $dBpassword = "";
    $dBname = "test2";

    $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);

    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }


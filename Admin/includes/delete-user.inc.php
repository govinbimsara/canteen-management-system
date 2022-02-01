<?php

    include_once "dbh.inc.php";

    if(isset($_POST["delete"])){

        $userid = $_POST["user_id"];

        

        $sql = "DELETE FROM wallet WHERE user_id= $userid";
        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");

        $sql1 = "DELETE FROM customer WHERE user_id= $userid";
        $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");

        $sql2 = "DELETE FROM users WHERE user_id= $userid";
        $result2 = mysqli_query($conn, $sql2) or die("Bad SQL: $sql2");
        
        header("location: ../index.php?error=succeful");

    }
    else{
        header("location: index.php?error=error");
    }
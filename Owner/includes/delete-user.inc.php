<?php

    include_once "dbh.inc.php";

    if(isset($_POST["submit"])){

        $wid = $_POST["wid"];
        $amount = $_POST["amount"];

        

        $sql = "SELECT * FROM wallet WHERE wallet_id = $wid";
        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
        $res = mysqli_fetch_assoc($result);
        $balance = $res['balance'];

        $balance = $balance + $amount;

        $sql1 = "UPDATE wallet SET balance = $balance WHERE wallet_id = $wid";
        $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
        
        header("location: ../reload.php?reset=succeful");

    }
    else{
        header("location: ../index.php");
    }
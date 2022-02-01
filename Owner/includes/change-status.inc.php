<?php

    if(isset($_POST["submit"])){

        include_once "dbh.inc.php";

        $status = $_POST["status"];
        $order_number = $_POST["order_number"];

        $sql = "UPDATE orders SET order_status = ? WHERE order_number = ?;";
        $stmt = mysqli_stmt_init($conn);
 
        if(!mysqli_stmt_prepare($stmt, $sql)){
         header("location: ../orders.php?error=stmtfailed");
         exit();
        }
        mysqli_stmt_bind_param($stmt, "si", $status, $order_number);
        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
        header("location: ../orders.php?error=noerror");
    }else{
        header("location: ../orders.php?error=noentry");
        exit();
    }
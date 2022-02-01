<?php

    if(isset($_POST["submit"])){

        include_once "dbh.inc.php";
        require_once '../vendor/autoload.php';

        $basic  = new \Vonage\Client\Credentials\Basic("0a31bb3a", "BYycMpslmL6VxMGW");
        $client = new \Vonage\Client($basic);

        $status = $_POST["status"];
        $order_number = $_POST["order_number"];

        $sql1 = "SELECT * FROM orders WHERE order_number=".$order_number."";
        $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
        $res = mysqli_fetch_assoc($result1);
        $username = $res['username'];
        
        $sql2 = "SELECT * FROM users WHERE username='".$username."'";
        $result2 = mysqli_query($conn, $sql2) or die("Bad SQL: $sql2");
        $res1 = mysqli_fetch_assoc($result2);
        $mobile = $res1['phone_number'];

        $sql = "UPDATE orders SET order_status = ? WHERE order_number = ?;";
        $stmt = mysqli_stmt_init($conn);

        $messege = 'Your order No. '.$order_number.' is ' .$status. '. SciCafe';
        $ind = '94';
        $number = $ind.strval($mobile);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("94773515885", 'Admin-ScienceCafe', $messege)
        );
 
        if(!mysqli_stmt_prepare($stmt, $sql)){
         header("location: ../orders.php?error=stmtfailed");
         exit();
        }
        mysqli_stmt_bind_param($stmt, "si", $status, $order_number);
        mysqli_stmt_execute($stmt);
    
        mysqli_stmt_close($stmt);
        header("location: ../orders-process.php?error=noerror");
    }else{
        header("location: ../orders-process.php?error=noentry");
        exit();
    }
<?php
    session_start();
    if(isset($_POST['submit']))
    {
        $customerID = $_POST['cID'];
        $uname = $_POST['uname'];
        $dineortake = $_POST['DorT'];
        $paymentmetod = 'Online';
        $total = $_POST['grand'];
        $status = 'Processing';

        include_once "dbh.inc.php";
        require_once 'functions.inc.php';

        $sql = "SELECT * FROM customer WHERE user_id = '$customerID'";
        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
        $row = mysqli_fetch_assoc($result);
        $customerID = $row['customer_id'];

        // $sql1 = "SELECT * FROM wallet WHERE customer_id = $customerID";
        // $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
        // $res = mysqli_fetch_assoc($result1);
        // $balance = $res['balance'];

        if(empty($customerID) || empty($uname) || empty($dineortake) || empty($paymentmetod) || empty($total) || empty($status)){
            header("location: ../place-order.php?error=emptyfield");
            exit();
        }

        // $balance = $balance - $total;

        // $sql2 = "UPDATE wallet SET balance = $balance WHERE customer_id = $customerID";
        // $result2 = mysqli_query($conn, $sql2) or die("Bad SQL: $sql2");
 
        $sql = "INSERT INTO orders (customer_id, username, dine_or_takeaway, total, order_status, payment_type) VALUES (?,?,?,?,?,?);"; 
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../place-order.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ississ", $customerID, $uname, $dineortake, $total, $status, $paymentmetod);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        $last_entry1 = mysqli_insert_id($conn);

        foreach($_SESSION['cart'] as $key => $val){
            $sql = "SELECT * FROM product WHERE product_id = '$key'";
            $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
            $row = mysqli_fetch_assoc($result);

            $sub = $val * $row['price'];

            $sql1 = "INSERT INTO order_details (order_number, product_id, quantity, price) VALUES (?,?,?,?);"; 
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql1)){
                header("location: ../place-order.php?error=stmtfailed1");
                exit();
            }

            mysqli_stmt_bind_param($stmt, "iiii", $last_entry1, $key, $val, $sub);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

        }
        // unset($_SESSION['cart']);
        header("location: clear-online-cart.inc.php");
        // delayed($conn, $last_entry1);
        
    }
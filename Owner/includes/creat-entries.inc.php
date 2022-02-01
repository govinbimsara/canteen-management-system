<?php
// This will run every 24H and add an entry in fyp for every product which will then be altered realtime
include_once "dbh.inc.php";

$sql = "SELECT DISTINCT product_id, product_name FROM product WHERE menu_id='1' ORDER BY product_id";
$result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
if($result){
    foreach($result as $row)
            {
                $name = $row['product_name'];
                $pId = $row['product_id'];
                $qun = 0;
                $sales = 0;
                
                $sql1 = "INSERT INTO fyp (product_id, name, quantity, sales) VALUES (?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);


                if(!mysqli_stmt_prepare($stmt, $sql1)){
                    header("location: creat-entries.inc.php?error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isii", $pId,$name,$qun,$sales);
                mysqli_stmt_execute($stmt);
            
                mysqli_stmt_close($stmt);
                header("location: ../index.php?error=noerror");

            }
}

$sql = "SELECT DISTINCT product_id, product_name FROM product WHERE menu_id='0' ORDER BY product_id";
$result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
if($result){
    foreach($result as $row)
            {
                $name = $row['product_name'];
                $pId = $row['product_id'];
                $qun = 0;
                $sales = 0;
                
                $sql1 = "INSERT INTO fyp (product_id, name, quantity, sales) VALUES (?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);


                if(!mysqli_stmt_prepare($stmt, $sql1)){
                    header("location: creat-entries.inc.php?error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isii", $pId,$name,$qun,$sales);
                mysqli_stmt_execute($stmt);
            
                mysqli_stmt_close($stmt);
                header("location: ../index.php?error=noerror");

            }
}

$sql = "SELECT DISTINCT product_id, product_name FROM product WHERE menu_id='2' ORDER BY product_id";
$result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
if($result){
    foreach($result as $row)
            {
                $name = $row['product_name'];
                $pId = $row['product_id'];
                $qun = 0;
                $sales = 0;
                
                $sql1 = "INSERT INTO fyp (product_id, name, quantity, sales) VALUES (?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);


                if(!mysqli_stmt_prepare($stmt, $sql1)){
                    header("location: creat-entries.inc.php?error=stmtfailed");
                    exit();
                }

                mysqli_stmt_bind_param($stmt, "isii", $pId,$name,$qun,$sales);
                mysqli_stmt_execute($stmt);
            
                mysqli_stmt_close($stmt);
                header("location: ../index.php?error=noerror");

            }
}

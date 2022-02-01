<?php
    session_start();
    include_once "dbh.inc.php";
    include_once "functions.inc.php";

    unset($_SESSION['cart']);  


                  //to pass the total to data base
     
                         $sql="SELECT * FROM customer WHERE user_id={$_SESSION["userid"]}";
                        $rst=mysqli_query($conn,$sql);
                        if($rst){
                           $row=mysqli_fetch_assoc($rst);
                             $cusid=$row['customer_id'];
                             $datt=date("l jS \of F Y h:i:s A");
                             $tot=$_SESSION['total'];
                              
                             $sql1="INSERT INTO online_transaction (customer_id,add_date,paid_amount) VALUES ('{$cusid}','{$datt}','{$tot}')";

                             $rst1=mysqli_query($conn,$sql1);

                             if($rst1){
                              unset($_SESSION['total']);
                                // session_destroy($_SESSION['total']);
                                 echo "";
                               
                             header("location: ../cart.php?msg=successful");

                             }


                                            
                        

                        }
              
                   //
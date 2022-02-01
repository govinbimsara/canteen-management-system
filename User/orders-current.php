<?php
    include('header.php');
?>
<?php
    include_once "includes/dbh.inc.php";
    include_once "includes/functions.inc.php";
?>
<?php
    if(!isset($_SESSION['username'])){
        header("location: index.php");
        exit();
    }
?>

<div class="banner header-text">
      <div class="owl-banner owl-carousel">

       	 <div class="banner-item-01">
          		<div class="text-content">
           				 <h2>Your orders</h2>
           				 <h4><?php
              $a = $_SESSION["username"];
              echo $a
              ?></h4>
         		 </div>
       	 </div>

      </div>
</div>


<?php
    $username = $_SESSION['userid'];
    $sql = "SELECT * FROM customer WHERE user_id = '$username'";
        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
        $row = mysqli_fetch_assoc($result);
        $customerID = $row['customer_id'];
echo '<div class="container mt-5">
    <div class="table-responsive">
    <h4 class="text-center mb-3">Current Orders</h4>
        <table class="table table-dark table-borderless">
        <thead>
            <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Dine or take away</th>
            <th scope="col">Grand total</th>
            <th scope="col">Order status</th>
            <th scope="col">Payment type</th>
            </tr>
        </thead>
        <tbody>';
        $grand = 0;
        $sql = "SELECT * FROM orders WHERE customer_id='$customerID' AND NOT (order_status='Completed' OR order_status='Cancelled') ORDER BY order_number DESC";
        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
              if($result){ 
                foreach($result as $row){
                echo "
                    <tr>
                    <td>".$row['order_number']."</td>
                    <td>".$row['dine_or_takeaway']."</td>
                    <td>".$row['total']."</td>
                    <td>
                        <div class='pp-status-circle ".$row['order_status']."'>
                        </div>".$row['order_status']."
                    </td>
                    <td>".$row['payment_type']."</td>
                    </tr>
                    ";
                    $no = $row['order_number'];
                    echo "
                    <tr>
                        <td colspan='5'>
                            <table class='table'>
                                <thead>
                                <tr>
                                <th scope='col'>PRODUCT ID</th>
                                <th scope='col'>PRODUCT NAME</th>
                                <th scope='col'>QUANTITY</th>
                                <th scope='col'>SUB TOTAL</th>
                                </tr>
                                </thead>";
                               echo ' <tbody>';

                                $sql1 = "SELECT * FROM order_details WHERE order_number='$no'";
                                $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
                                    if($result1){ 
                                        foreach($result1 as $row1){
                                            $id = $row1["product_id"];
                                            $sql2 = "SELECT * FROM product WHERE product_id='$id'";
                                            $result2 = mysqli_query($conn, $sql2) or die("Bad SQL: $sql2");
                                            $row3 = mysqli_fetch_assoc($result2);
                                            $sub = $row1["quantity"] * $row1["price"];
                                            echo '
                                            <tr">
                                                <th scope="row"><b>'.$row1["product_id"].'</b></th>
                                                <td><b>'.$row3["product_name"].'</b></td>
                                                <td><b>'.$row1["quantity"].'</b></td>
                                                <td><b>'.$row1["price"].'</b></td>
                                                </tr>';
                                                }
                                              echo '</tbody>';
                    echo "
                                
                            </table>
                        </td>
                    </tr>
                ";
                }
                }

              }
                
            
echo        '</tbody>
        </table>
    </div>
</div>';
?>


<?php
    include('footer.php');
?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Additional Scripts -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/isotope.js"></script>
<script src="assets/js/accordions.js"></script>

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
           				 <h2>Shopping cart</h2>
           				 <h4><?php
              $a = $_SESSION["username"];
              echo $a
              ?></h4>
         		 </div>
       	 </div>

      </div>
</div>

<?php
echo '<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-borderless">
        <thead>
            <tr>
            <th scope="col">Item</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>';
        $grand = 0;
        if(empty($_SESSION['cart'])){
            echo "<tr><td colspan='4'>Your cart is empty</td></tr>";
        } else{
                
                foreach($_SESSION['cart'] as $key => $val){
                $sql = "SELECT * FROM product WHERE product_id = '$key'";
                $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
                $row = mysqli_fetch_assoc($result);
                

                $sub = $val * $row['price'];
                $grand += $sub;
                $dollar = $grand/200;
        //n To store the grand IN SESSION totle
         $_SESSION['total']=$grand;
        //
                echo "
                    <tr>
                    <td>".$row['product_name']."</td>
                    <td>".$row['price']."</td>
                    <td>
                        <form action='includes/add-quantity.inc.php' method='POST'>
                            <button class='filled-button' type='submit' name='submit' style='background-color: #f33f3f;
                                color: #fff;
                                font-size: 14px;
                                text-transform: capitalize;
                                font-weight: 300;
                                padding: 2px 5px;
                                border-radius: 5px;
                                display: inline-block;
                                transition: all 0.3s;
                                border: none;
                                outline: none;
                                cursor: pointer;'>+</button>
                            <input type='hidden' name='pID' id='pID' value=".$key.">
                        </form>
                        ".$val."
                        <form action='includes/remove-quantity.inc.php' method='POST'>
                            <button class='filled-button' type='submit' name='submit' style='background-color: #f33f3f;
                                    color: #fff;
                                    font-size: 14px;
                                    text-transform: capitalize;
                                    font-weight: 300;
                                    padding: 2px 5px;
                                    border-radius: 5px;
                                    display: inline-block;
                                    transition: all 0.3s;
                                    border: none;
                                    outline: none;
                                    cursor: pointer;'>-</button>
                                    <input type='hidden' name='pID' id='pID' value=".$key.">
                            </form>
                    </td>
                    <td>Rs".$sub."</td>
                    </tr>
                    ";
                }
            }
            
echo        '</tbody>
        </table>
        <h4>Grand Total: '.$grand.'</h4>
    </div>
</div>';
?>
<br>
<!-- <?php   echo "<pre>";
print_r($_POST);
echo "</pre>";
?> -->
    <div class="container">
            <br>
        <?php
            $a = $_SESSION['userid'];
            $sql1 = "SELECT * FROM wallet WHERE user_id = $a";
            $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
            $res = mysqli_fetch_assoc($result1);
            $balance = $res['balance'];

        if($balance >= $grand){
        echo '
        <form action="place-order.php" method="POST">
        <div>
            <input type="hidden" name="grand" id="uname" value='.$grand.'>
        </div>
            <button class="filled-button" style="float: right!important; background-color: #f33f3f;
    color: #fff;
    font-size: 14px;
    text-transform: capitalize;
    font-weight: 300;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    transition: all 0.3s;
    border: none;
    outline: none;
    cursor: pointer;" name="submit">Pay via Wallet</button>
        </form>';
        }else{
            echo '<h3>Your balance is too low please reload</h3>';
        }
        ?>

<table class="table table-borderless">

  <tbody>
    <tr>
      <td><form action="includes/clear-cart.inc.php" method="POST">
            <button type="submit" class="filled-button" name="submit" style="background-color: #f33f3f;
    color: #fff;
    font-size: 14px;
    text-transform: capitalize;
    font-weight: 300;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    transition: all 0.3s;
    border: none;
    outline: none;
    cursor: pointer;">Clear Cart</button>
        </form>
    </td>

    </tr>
    <tr>
    <td>                <!-- paypal -->

<div style=" font-size: 14px;
text-transform: capitalize;
font-weight: 300;
padding: 0px 0px;
border-radius: 5px;
display: inline-block;
transition: all 0.3s;
border: none;
outline: none;
cursor: pointer;
align : right;">

<div id="paypal-payment-button" class="float-left">
</div>
</div>


<!-- end paypal --></td>


    </tr>
  </tbody>
</table>


    </div>




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
<script src="https://www.paypal.com/sdk/js?client-id=AbHKOrPhE6-hGrat7OLshlhaBdVrUe8hGwYtOTpWs4OrHA7sxNlpWZHCtrtdNTDIHfZGUzhFMfQHzjUD&disable-funding=credit,card"></script>
<script>
    let price = '<?= $dollar ?>';

    paypal
        .Buttons({
            style: {
                color: "blue",
                shape: "pill",
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: price,
                        },
                    }, ],
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    window.location.replace(
                        "http://localhost/csproject1/place-online-order.php"
                    );
                });
            },
            onCancel: function(data) {
                //
               
                window.location.replace(
                    "http://localhost/csproject1/cart.php"
                );
            },
        })
        .render("#paypal-payment-button");
</script>

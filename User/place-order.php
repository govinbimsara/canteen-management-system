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

    $grand = $_POST["grand"]; 
?>

<div class="banner header-text">
      <div class="owl-banner owl-carousel">

       	 <div class="banner-item-01">
          		<div class="text-content">
           				 <h2>Place Order</h2>
         		 </div>
       	 </div>

      </div>
</div>


<br>

    <div class="container">
    

        <form action="includes/place-order.inc.php" method="POST">

        <div>
            <input type="hidden" name="grand" id="grand" value="<?php echo $grand ?>">
        </div>

        <div>
            <input type="hidden" name="uname" id="uname" value="<?php echo $_SESSION['username'] ?>">
        </div>

        <div>
            <input type="hidden" name="cID" id="cID" value="<?php echo $_SESSION['userid'] ?>">
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <select name="DorT" class="form-select" aria-label="Default select example">
                            <option selected>Dine-in or Take-away</option>
                            <option value="Dine">Dine</option>
                            <option value="Take away">Take away</option>
                        </select>
                    </fieldset>
            </div>
        <div>
        <!-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                        <select name="paymentM" class="form-select" aria-label="Default select example">
                            <option selected>Select topic</option>
                            <option value="Cash">Cash</option>
                            <option value="Credit">Credit</option>
                        </select>
                    </fieldset>
            </div>
        <div> -->
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
    cursor: pointer;">Place order</button>
        </form>

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

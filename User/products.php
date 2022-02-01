<?php
    include('header.php');
?>
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Our</h4>
            <h2>Menu</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Flash Deals</h4>
            <h2>Get your best products</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab last minute deals</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters">
                    <ul>
                        <!--<li class="active" data-filter="*">All Products</li>
                        <li data-filter=".des">Lunch</li>
                        <li data-filter=".dev">Breakfast</li>
                        <li data-filter=".gra">ShortEats</li>-->
                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="filters-content">
                    <div class="row grid">
                        <?php

                        $servername = "localhost";
                        $dBUsername = "root";
                        $dBpassword = "";
                        $dBname = "test1";

                        $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $query = "select * from product";
                        $result = mysqli_query($conn, $query);

                        $query1 = "select * from image";
                        $result1 = mysqli_query($conn, $query1);
                        ?>

                        <!DOCTYPE html>
                        <html>
                        <title>

                            <head></head>
                        </title>

                        <table>
                            
                            <?php
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="col-lg-4 col-md-4 all des">
                                    <div class="product-item">
                                        
                                        <div class="down-content">
                                            <a href="#">
                                                <h4><?php echo $rows['product_name']; ?></h4>
                                                <h4><?php echo $rows['brand_name']; ?></h4>
                                            </a>
                                            <h6>Rs.<?php echo $rows['price']; ?></h6>
                                            <p><?php echo $rows['product_description']; ?></p>
                                            <h5>Qty:<?php echo $rows['qty']; ?></h5>

                                            <span>Reviews (12)</span>
                                            <?php
                                            if(isset($_SESSION["username"])){
                                            echo '<form action="includes/add-to-cart.inc.php" method="POST">
                                                <input type="hidden" name="pID" id="pID" value='.$rows["product_id"].'>
                                                <input type="submit" name="submit" value="+CART">
                                            </form>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                        </table>
                        </html>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <ul class="pages">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
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


<script language = "text/Javascript"> 
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
</script>
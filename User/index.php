<?php
include('header.php');
?>
<?php
    include_once "includes/dbh.inc.php";
    include_once "includes/functions.inc.php";
?>
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Welcome to</h4>
            <h2>SCIENCE CAFE</h2>
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

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="food.php">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>
          </div>
          </div>
          </div>
          
    <div class="products">
    <div class="container">
        <div class="row">
            
            </div>
            <div class="col-md-12">
                <div class="filters-content">
                    <!-- <div class="col-lg-4 col-md-4 all des">-->
                    <div class="row grid">


                        <?php
                        $query = "select * from product where category_id='2' && menu_id='1' ";
                        $result = mysqli_query($conn, $query);
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


                                        <a <?php
                                            $prodid = $rows['product_id'];
                                            echo "href='view-food.php?id=$prodid' id='popedit'";
                                            ?>>
                                            <?php
                                            echo '<img src="includes/uploads/' . $rows['product_image'] . '" width="100px;" height="350px;"alt="product_image">' 
                                            ?>
                                        </a>

                                        <div class="down-content">
                                            <a>
                                                <h4><?php echo $rows['product_name']; ?></h4>
                                                <h4><?php echo $rows['availability']; ?></h4>
                                                <h4>Available Quantity :<b><?php echo $rows['qty']; ?></b></h4>
                                            </a>
                                            <h6>Rs.<?php echo $rows['price']; ?></h6>
                                            <br>
                                            <div>
                                            
                                            </div>
                                            





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














        </div>



    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>




    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Science Cafe</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Don't want to deal with the hassel at lunch time?</h4>
              <p> We made Science Cafe so you don't have to be bothered with dealing with the huge queues at lunch time, and in these times of pandemics it's an excellent way to practice social distance.</p>
              <ul class="featured-list">
                <li><a>You will never have to wait in the queues</a></li>
                <li><a>You will never get a token for change</a></li>
                <li><a>You will exactly know what we have in store</a></li>
                <li><a>Just place an order and we'll let you know when it's ready</a></li>
              </ul>
              <br>
              <?php
                  if(isset($_SESSION["username"])){
                    echo '
              <h4>Already have an account let\'s get you to the menu</h4>
              <a href="food.php" class="filled-button">Our Menu</a>';
              }else{
                echo '
                <h4>Still don\'t have an account ? Let\'s get you registered right away</h4>
                <a href="creat-account.php" class="filled-button">Register Now</a>';
              }
              ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/coffee.png" alt="">
            </div>
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
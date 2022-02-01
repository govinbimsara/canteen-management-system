<?php
include('header.php');
include_once "includes/dbh.inc.php";
?>

<!-- Page Content -->
<!-- <div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>Find All Your</h4>
                    <h2>Favourite</h2>
                    <h4>Taste Here.</h4>
                </div>
                <div>
                    <h5>Make Your Own Order With the List Of Menues.</h5>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Our</h4>
            <h2>Menu</h2>
          </div>
        </div>
        
        
      </div>
    </div>


<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">ALL</li>
                        <li data-filter=".dev">Breakfast</li>
                        <li data-filter=".des">Lunch</li>
                        <li data-filter=".gra">Others</li>
                    </ul>
                </div>
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

            <div class="col-md-12">
                <div class="filters-content">
                    <!-- <div class="col-lg-4 col-md-4 all des">-->
                    <div class="row grid">


                        <?php



                        $query = "select * from product where category_id='2' && menu_id='2' ";
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
                                            <a href="#">
                                                <h4><?php echo $rows['product_name']; ?></h4>
                                                <h4><?php echo $rows['availability']; ?></h4>
                                                <h4>Available Quantity :<b><?php echo $rows['qty']; ?></b></h4>
                                            </a>
                                            <h6>Rs.<?php echo $rows['price']; ?></h6>
                                            <br></br>





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
                <div class="filters-content">
                    <!-- <div class="col-lg-4 col-md-4 all des">-->
                    <div class="row grid">
                        <?php




                        $query = "select * from product where category_id='1'&& menu_id='1' ";
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
                                <div class="col-lg-4 col-md-4 all dev">
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
                                            <a href="#">
                                                <h4><?php echo $rows['product_name']; ?></h4>
                                                <h4><?php echo $rows['availability']; ?></h4>
                                                <h4>Available Quantity :<b><?php echo $rows['qty']; ?></b></h4>

                                            </a>
                                            <h6>Rs.<?php echo $rows['price']; ?></h6>


                                            
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
                <div class="filters-content">
                    <!-- <div class="col-lg-4 col-md-4 all des">-->
                    <div class="row grid">
                        <?php




                        $query = "select * from product where category_id='1'&& menu_id='2' ";
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
                                <div class="col-lg-4 col-md-4 all dev">
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
                                            <a href="#">
                                                <h4><?php echo $rows['product_name']; ?></h4>
                                                <h4><?php echo $rows['availability']; ?></h4>
                                                <h4>Available Quantity :<b><?php echo $rows['qty']; ?></b></h4>

                                            </a>
                                            <h6>Rs.<?php echo $rows['price']; ?></h6>

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
                <div class="filters-content">
                    <!-- <div class="col-lg-4 col-md-4 all des">-->
                    <div class="row grid">
                        <?php





                        $query = "select * from product where category_id='3' ";
                        $result = mysqli_query($conn, $query);


                        ?>

                        <!DOCTYPE html>
                        <html>
                        <title>

                            <head></head>
                        </title>

                        <table>

                            <?php

                            while ($rows = mysqli_fetch_array($result)) {

                            ?>
                                <div class="col-lg-4 col-md-4 all gra">
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
                                            <a href="#">
                                                <h4><?php echo $rows['product_name']; ?></h4>
                                                <h4>Qty:<?php echo $rows['qty']; ?></h4>
                                                <h4>Available Quantity :<b><?php echo $rows['qty']; ?></b></h4>
                                            </a>
                                            <h6>Rs.<?php echo $rows['price']; ?></h6>




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


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>
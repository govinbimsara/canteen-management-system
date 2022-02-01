<?php
include('header.php');
include_once "includes/dbh.inc.php";
?>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">

    </div>
</div>
<!-- Banner Ends Here -->

<?php

$prodid = $_GET['id'];


$q = "select * from product where product_id='$prodid'";

$result = mysqli_query($conn, $q);

while ($rows = mysqli_fetch_array($result)) {
    $prodid = $rows['product_id'];
    $productName = $rows['product_name'];
    $price = $rows['price'];
    $qty = $rows['qty'];
    $productdescription = $rows['product_description'];
    $category = $rows['category_id'];
    $brand = $rows['brand_id'];
    $image = $rows['product_image'];
?>

    <div>
        <div class="container tm-mt-big tm-mb-big">
            <div class="row">
                <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                    <div class="tm-bg-primary-dark tm-block tm-block-h-auto">

                        <div class="row tm-edit-product-row">
                            <div class="row tm-edit-product-row">
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <br></br>
                                    <br></br>
                                    <div class="form-group mb-3">

                                        <a href="#"><?php echo '<img src="includes/uploads/' . $rows['product_image'] . '" width="300px;" height="350px;"alt="product_image">' ?> </a>
                                    </div>

                                    <div class="form-group mb-3">

                                        <h6>Rs.<?php echo $productName; ?></h6>
                                    </div>


                                    <div class="form-group mb-3">
                                        <p><?php echo $productdescription; ?></p>
                                    </div>
                                    <div class="form-group mb-3">
                                        <p>Available Quatity : <b><?php echo $qty; ?></b></p>
                                    </div>

                                    <div class="row">

                                        <div class="form-group mb-3 col-xs-12 col-sm-6">

                                            <h6>Rs.<?php echo $price; ?></h6>

                                        </div>

                                    </div>

                                    <?php
                                    // Orderin is only available from 5:00PM to 11:00AM
                                    if(time()>strtotime("5:00PM") && time()<strtotime("11:00AM")){
                                        echo '<b>You cannot place an order at this time</b>';
                                    }else{
                                        if (isset($_SESSION["username"])) {
                                            echo '<form action="includes/add-to-cart.inc.php" method="POST">
                                                <input type="hidden" name="pID" id="pID" value=' . $rows["product_id"] . '>
                                                <button id="order" type="submit" name="submit" value="Add to Cart"  >Add to Cart <i class="fas fa-shopping-cart"></i></button>
                                                <!-- <input type="submit" name="submit" value="Add to Cart"> -->
                                            </form>';
                                        }else{
                                            echo '<h6><b>Please login in order to place order</b></h6>';
                                        }
                                    }
                                    // Ends here
                                    
                                    }
                                    ?>
                                    <div>
                                    <?php
                                    if (isset($_SESSION["username"])) {
                                        echo '
                                    <form action="review.php" method="POST">
                                        <input type="hidden" name="prod_id" id="prod_id" class="form-control" value=' . $prodid . ' />
                                        <!-- <input type="submit" name="submit" value="Review Item"> -->
                                        <button type="submit" name="submit" value="Review Item" >Review Item</button>
                                    </form>';
                                    }
                                    ?>
                                    </div>
                                    <p>If you want to you can add aditional curries with this portion.Go to Lunch Menu and select.</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">0.0</span> / 5</b>
                            </h1>
                            <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div>
                            <h3><span id="total_review">0</span> Review</h3>
                        </div>
                        <div class="col-sm-4">
                            <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>
                            </p>
                            <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>
                            </p>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


        <!-- Additional Scripts -->
        <script src="assets/js/custom.js"></script>
        <script src="assets/js/owl.js"></script>
        <script src="assets/js/slick.js"></script>
        <script src="assets/js/isotope.js"></script>
        <script src="assets/js/accordions.js"></script>
        <!-- <script type="text/javascript" defer="defer">
            
            var UTC_hours = new Date().getUTCHours();
            if(UTC_hours > 5 && UTC_hours < 17)
            document.getElementById('order').disabled = true;
            
        </script> -->
        <script>
            var rating_data = 0;



            function reset_background() {
                for (var count = 1; count <= 5; count++) {

                    $('#submit_star_' + count).addClass('star-light');

                    $('#submit_star_' + count).removeClass('text-warning');

                }
            }



            load_rating_data();

            function load_rating_data() {
                var prod_id = $('#prod_id').val()

                $.ajax({
                    url: "includes/fetch_rating.inc.php",
                    method: "POST",
                    data: {
                        action: 'load_data',
                        prod_id: prod_id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#average_rating').text(data.average_rating);
                        $('#total_review').text(data.total_review);

                        var count_star = 0;

                        $('.main_star').each(function() {
                            count_star++;
                            if (Math.ceil(data.average_rating) >= count_star) {
                                $(this).addClass('text-warning');
                                $(this).addClass('star-light');
                            }
                        });

                        $('#total_five_star_review').text(data.five_star_review);

                        $('#total_four_star_review').text(data.four_star_review);

                        $('#total_three_star_review').text(data.three_star_review);

                        $('#total_two_star_review').text(data.two_star_review);

                        $('#total_one_star_review').text(data.one_star_review);

                        $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                        $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                        $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                        $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                        $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                        if (data.review_data.length > 0) {
                            var html = '';

                            for (var count = 0; count < data.review_data.length; count++) {
                                html += '<div class="row mb-3">';

                                html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                                html += '<div class="col-sm-11">';

                                html += '<div class="card">';

                                html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

                                html += '<div class="card-body">';

                                for (var star = 1; star <= 5; star++) {
                                    var class_name = '';

                                    if (data.review_data[count].rating >= star) {
                                        class_name = 'text-warning';
                                    } else {
                                        class_name = 'star-light';
                                    }

                                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                                }

                                html += '<br />';

                                html += data.review_data[count].user_review;

                                html += '</div>';

                                html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

                                html += '</div>';

                                html += '</div>';

                                html += '</div>';
                            }

                            $('#review_content').html(html);
                        }
                    }
                })
            }
        </script>
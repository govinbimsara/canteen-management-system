<?php
include('header.php');
?>
<link rel="stylesheet" href="css/grp.css">

<?php
        if(!isset($_SESSION['username'])){
        header("location: login.php");
        ob_end_flush();
    }
?>

<?php
    include_once "includes/dbh.inc.php";
    $product_query1 = "SELECT * FROM product WHERE 	category_id  = 1 ";
    $query_result1 = mysqli_query($conn, $product_query1);


    $product_query2 = "SELECT * FROM product WHERE 	category_id  = 2 ";
    $query_result2 = mysqli_query($conn, $product_query2);

    $product_query3 = "SELECT * FROM product WHERE 	category_id  = 3 ";
    $query_result3 = mysqli_query($conn, $product_query3);

    $query_result1 = mysqli_query($conn, $product_query1);
    $query_result2 = mysqli_query($conn, $product_query2);
    $query_result3 = mysqli_query($conn, $product_query3);
?>
<div class="container mt-5">
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-xl-4 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-product-categories" style="overflow-y:scroll;">

                    <!-- table container -->
                    <a href="chart.other.php">

                        <button name="brf" class="btn btn-primary btn-block text-uppercase mb-3">
                            BREAKFAST'S FOOD REPORT
                        </button>

                    </a>

                    <table class="table tm-table-small tm-product-table">
                        <tbody style="overflow-y:scroll; height:fit-content">
                            <?php

                            foreach ($query_result1 as $prLunch) {
                            ?>
                            <tr>
                                <td class=" tm-product-name">
                                    <?= $prLunch['product_name'] ?>
                                </td>
                                <td class="text-center">

                                </td>

                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-xl-4 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-product-categories" style="overflow-y:scroll;">

                    <!-- table container -->
                    <a href="chart.other.php"> <button name="lunch"
                            class="btn btn-primary btn-block text-uppercase mb-3">
                            LUNCH'S FOOD REPORT
                        </button>
                    </a>
                    <table class="table tm-table-small tm-product-table">
                        <tbody>
                            <?php

                            foreach ($query_result2 as $prLunch) {
                            ?>
                            <tr>
                                <td class=" tm-product-name">
                                    <?= $prLunch['product_name'] ?>
                                </td>
                                <td class="text-center">

                                </td>

                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>



            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-product-categories" style="overflow-y:scroll;">

                    <!-- table container -->
                    <a href="chart.other.php">
                        <button name="other" class="btn btn-primary btn-block text-uppercase mb-3">
                            OTHER FOOD REPORT
                        </button>
                    </a>


                    <table class="table tm-table-small tm-product-table">
                        <tbody>
                            <?php

                            foreach ($query_result3 as $prLunch) {
                            ?>
                            <tr>
                                <td class="tm-product-name">
                                    <?= $prLunch['product_name'] ?>
                                </td>
                                <td class="text-center">

                                </td>

                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <script src="js/jquery-3.3.1.min.js"></script>
        <!-- https://jquery.com/download/ -->
        <script src="js/moment.min.js"></script>
        <!-- https://momentjs.com/ -->
        <script src="js/Chart.min.js"></script>
        <!-- http://www.chartjs.org/docs/latest/ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- https://getbootstrap.com/ -->
        <script src="js/tooplate-scripts.js"></script>
    </div>
    <?php
    include('footer.php');
?>

<script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
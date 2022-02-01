<?php
include('header.php');
?>

<?php
        if(!isset($_SESSION['username'])){
        header("location: login.php");
        ob_end_flush();
    }
?>
<?php
    include_once "includes/dbh.inc.php";
?>
<?php   
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>


                <div class="col-12 tm-block-col">
                <h2 class="ph-block-title">Accepted Orders</h2>
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                    <table id="orders" style="width:100%" class="table table-dark table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Orders</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                        //<table id="orders" style="width:100%; border-spacing: 50px; padding: 15px" border="2px" bordercolor="#E7E7E7">

                        $sql = "SELECT * FROM orders WHERE order_status='Accepted' ORDER BY order_number DESC";
                        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
                            if($result){ 
                                foreach($result as $row){
                                    $no = $row['order_number'];
                            echo '  
                                        <tr>
                                            <td>
                                    <h2 class="tm-block-title">ORDER NUMBER: #'.$row["order_number"].'</h2>
                                    <h2 class="tm-block-title">CUSTOMER ID: '.$row["customer_id"].'</h2>
                                    <h2 class="tm-block-title">DINE OR TAKEAWAY: '.$row["dine_or_takeaway"].'</h2>
                                    <h2 class="tm-block-title">PAYMENT TYPE: '.$row["payment_type"].'</h2>
                                    <h2 class="tm-block-title">ORDER STATUS: '.$row["order_status"].'    <div class="pp-status-circle '.$row["order_status"].'"></h2>
                                    <h2 class="tm-block-title">GRAND TOTAL: Rs.'.$row["total"].'</h2>';

                            echo '
                            <form action="includes/status.inc.php" method="POST">
                            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div>
                        <input type="hidden" name="order_number" id="order_number" value="'.$row["order_number"].'">
                    </div>
                    <fieldset>
                        <select name="status" class="form-select" aria-label="Default select example">
                            <option selected>'.$row["order_status"].'</option>
                            <option value="Cancelled">Cancelled</option>
                            <option value="Ready">Ready</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </fieldset>
            </div>
            </div>
        <button type="submit" class="filled-button" name="submit" style="background-color: #f5a623;
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
    cursor: pointer;">Change status</button>
        </form>
                            ';

                       echo '<table class="table table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">PRODUCT ID</th>
                                    <th scope="col">PRODUCT NAME</th>
                                    <th scope="col">QUANTITY</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">SUB TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>';

                            $sql1 = "SELECT * FROM order_details WHERE order_number='$no'";
                            $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
                                if($result1){ 
                                    foreach($result1 as $row1){
                                        $id = $row1["product_id"];
                                        $sql2 = "SELECT * FROM product WHERE product_id='$id'";
                                        $result2 = mysqli_query($conn, $sql2) or die("Bad SQL: $sql2");
                                        $row3 = mysqli_fetch_assoc($result2);
                                        $sub = $row1["price"];
                                echo '
                                <tr class="table-dark">
                                    <th style="background-color: #f5a623" scope="row"><b>'.$row1["product_id"].'</b></th>
                                    <td style="background-color: #f5a623"><b>'.$row3["product_name"].'</b></td>
                                    <td style="background-color: #f5a623"><b>'.$row1["quantity"].'</b></td>
                                    <td style="background-color: #f5a623"><b>'.$row3["price"].'</b></td>
                                    <td style="background-color: #f5a623"><b>'.$sub.'</b></td>
                                    </tr>';
                                    }
                                    echo '
                                </tbody>
                            </table>
                            <br><br>';
                                }
                            echo '
                                    </td>
                                </tr>';
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                            
                </div>
            </div>
            <div>
                <form action="includes/status-bulk-accepted.inc.php" method="POST">

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <fieldset>
                                    <select name="status" class="form-select" aria-label="Default select example">
                                        <option selected>Accepted</option>
                                        <option value="Cancelled">Cancelled</option>
                                        <option value="Ready">Ready</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </fieldset>
                            </tr>
                            <tr>
                                <button type="submit" class="filled-button" name="submit" style="background-color: #f5a623;
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
                                                cursor: pointer;">Change status</button>
                            </tr>
                        </thead>
                    </table>
                </form>
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
    <!-- searchbox -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#orders').DataTable({
    autoFill: true
});
} );
    </script>

    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
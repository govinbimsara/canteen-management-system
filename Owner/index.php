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



<div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Owner</b></p>
                </div>
            </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <?php
                       echo '<table id="orders" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER NO.</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">CUSTOMER ID</th>
                                    <th scope="col">DINE OR TAKEAWAY</th>
                                    <th scope="col">PAYMENT TYPE</th>
                                    <th scope="col">GRAND TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>';
                            $grand = 0;
                            $sql = "SELECT * FROM orders WHERE NOT (order_status='Completed' OR order_status='Cancelled') ORDER BY order_number DESC";
                            //$sql = "SELECT * FROM orders WHERE order_status='Procesing' OR order_status='Accepted' OR order_status='Ready'";
                            $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
                                if($result){ 
                                    foreach($result as $row){
                                        $grand += $row["total"];
                                echo '
                                <tr>
                                    <th scope="row"><b>#'.$row["order_number"].'</b></th>
                                    <td>
                                        <div class="pp-status-circle '.$row["order_status"].'">
                                        </div>'.$row["order_status"].'
                                    </td>
                                    <td><b>'.$row["customer_id"].'</b></td>
                                    <td><b>'.$row["dine_or_takeaway"].'</b></td>
                                    <td><b>'.$row["payment_type"].'</b></td>
                                    <td><b>'.$row["total"].'</b></td>';
                                    }
                                }
                                echo '
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <h2 class="tm-block-title">Total assumed sales : Rs.'.$grand.'</h2>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
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
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
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Users List</h2>
                        <?php
                       echo '<table id="users" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">USER ID</th>
                                    <th scope="col">USER NAME</th>
                                    <th scope="col">FIRST NAME</th>
                                    <th scope="col">LAST NAME</th>
                                    <th scope="col">PHONE NUMBER</th>
                                    <th scope="col">STAFF OR STUDENT</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>';
                            $sql = "SELECT users.user_id, users.username, users.first_name, users.last_name, users.phone_number, customer.staff_or_student, customer.uni_id FROM users INNER JOIN customer ON users.user_id = customer.user_id ORDER BY users.user_id DESC";
                            //$sql = "SELECT * FROM orders WHERE order_status='Procesing' OR order_status='Accepted' OR order_status='Ready'";
                            $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
                                if($result){ 
                                    foreach($result as $row){
                                echo '
                                <tr>
                                    <th scope="row"><b>'.$row["user_id"].'</b></th>
                                    <td><b>'.$row["username"].'</b></td>
                                    <td><b>'.$row["first_name"].'</b></td>
                                    <td><b>'.$row["last_name"].'</b></td>
                                    <td><b>'.$row["phone_number"].'</b></td>
                                    <td><b>'.$row["staff_or_student"].'</b></td>
                                    <td><td><form action="includes/delete-user.inc.php" method="POST">
                                    <input type="hidden" name="user_id" id="user_id" value="'.$row["user_id"].'">
                                    <button type="submit" name="delete" class="filled-button" style="background-color: #f5a623;
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
                                    cursor: pointer;">DELETE</button>
                                    </form></td>';
                                    }
                                }
                                echo '
                                </tr>
                            </tbody>
                        </table>
                        <br>';
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#users').DataTable({
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
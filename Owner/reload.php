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

<div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <h2 class="tm-block-title">Orders List</h2>
                        <?php
                       echo '<table id="reload" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">CUSTOMER ID</th>
                                    <th scope="col">username</th>
                                    <th scope="col">MOBILE NUMBER</th>
                                    <th scope="col">WALLET BALANCE</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>';
                            $sql = "SELECT * FROM users";
                            $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
                                if($result){ 
                                    foreach($result as $row){
                                    $a = $row['user_id'];
                                    $sql1 = "SELECT * FROM wallet WHERE user_id = $a";
                                    $result1 = mysqli_query($conn, $sql1) or die("Bad SQL: $sql1");
                                    $res = mysqli_fetch_assoc($result1);
                                    $wID = $res['wallet_id'];
                                echo '
                                <tr>
                                    <th scope="row"><b>'.$row["user_id"].'</b></th>
                                    <td><b>'.$row["username"].'</b></td>
                                    <td><b>'.$row["phone_number"].'</b></td>
                                    <td><b>'.$res["balance"].'</b></td>
                                    <td><form action="reload-details.php" method="POST">
                                    <input type="hidden" name="user_id" id="user_id" value="'.$row["user_id"].'">
                                    <input type="hidden" name="username" id="username" value="'.$row["username"].'">
                                    <input type="hidden" name="phone_number" id="phone_number" value="'.$row["phone_number"].'">
                                    <input type="hidden" name="balance" id="balance" value="'.$res["balance"].'">
                                    <input type="hidden" name="wid" id="wid" value="'.$wID.'">
                                    <button type="submit" name="reload-number" class="filled-button" style="background-color: #f5a623;
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
                                    cursor: pointer;">RELOAD</button>
                                    </form></td>';
                                    }
                                }
                                echo '
                                </tr>
                            </tbody>
                        </table>';
                        ?>
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
    <!-- searchbox -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
    $('#reload').DataTable({
    autoFill: true
});
} );
    </script>
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
    if(isset($_POST["reload-number"])){

    $userID = $_POST["user_id"];
    $username = $_POST["username"];
    $phone = $_POST["phone_number"];
    $balance = $_POST["balance"];
    $wid = $_POST["wid"];
    }
    else{
    header("location: ../reload.php");
    }
?>
<div class="container">
    <div class="col-12 tm-block-col">
                    <h2 class="ph-block-title">Reload Customer</h2>
                        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                        <?php
                        echo '
                    <h2 class="tm-block-title">USER ID: '.$userID.'</h2>
                    <h2 class="tm-block-title">USER NAME: '.$username.'</h2>
                    <h2 class="tm-block-title">MOBILE NUMBER: '.$phone.'</h2>
                    <h2 class="tm-block-title">BALANCE: '.$balance.'</h2>';

                        ?>
                        </div>
                        <form action="includes/reload.inc.php" method="POST">
                            <input type="hidden" name="wid" id="wid" value="<?php echo $wid ?>">
                            <input type="text" class="form-control" name="amount" style="color: white" placeholder="Enter the amount to reload">
                            <button type="submit" name="reload" class="filled-button" style="background-color: #f5a623;
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
                        </form>
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
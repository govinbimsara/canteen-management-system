
<?php
    include('header.php');
?>
<?php
    include_once "includes/dbh.inc.php";
    include_once "includes/functions.inc.php";
?>
<?php
    if(!isset($_SESSION['username'])){
        header("location: index.php");
        exit();
    }
?>

    <!-- Page Content -->

    <div class="banner header-text">
      <div class="owl-banner owl-carousel">

       	 <div class="banner-item-02">
          		<div class="text-content">
           				 <h4>Welcome</h4>
           				 <h2><?php
              $a = $_SESSION["username"];
              echo $a
              ?></h2>
         		 </div>
       	 </div>

      </div>
    </div>




<?php
    $b = profileDetails($conn, $_SESSION["username"]);
    $d = walletDetails($conn, $_SESSION["userid"]);
    echo '<div class="container mt-5">';
    echo    '<h3 class="text-center mb-3">MY PROFILE</h3>';
     echo '<div class="table-responsive">';
      echo  '<table class="table table-bordered table-hover">';
      if($d["balance"]<50){
          echo '<caption>Your wallet balnce is low!</caption>';
      }
      echo '<tbody>
                <tr>
                    <td>
                        <b>First name:</b>
                    </td>
                    <td><b>'.$b["first_name"].'</b></td>
                </tr>';
       echo         '<tr>';
       echo             '<td>';
       echo                 '<b>Last name:</b>';
       echo             '</td>';
       echo             '<td>';
       echo                 '<b>';
       echo                     $b["last_name"];
       echo                 '</b>';
       echo             '</td>';
       echo         '</tr>';
       echo        '<tr>';
       echo             '<td>';
       echo                 '<b>Username:</b>';
       echo             '</td>';
       echo             '<td>';
       echo                 '<b>';
       echo                     $b["username"];
       echo                 '</b>';
       echo             '</td>';
       echo         '</tr>';
       echo         '<tr>';
       echo             '<td>';
       echo                 '<b>NIC:</b>';
       echo             '</td>';
       echo             '<td>';
       echo                 '<b>';
       echo                     $b["nic"];
       echo                 '</b>';
       echo             '</td>';
       echo         '</tr>';
       echo         '<tr>';
       echo             '<td>';
       echo                 '<b>E-mail:</b>';
       echo             '</td>';
       echo             '<td>';
       echo                 '<b>';
       echo                     $b["email"];
       echo                 '</b>';
       echo             '</td>';
       echo         '</tr>';
       echo         '<tr>';
       echo             '<td>';
       echo                 '<b>Mobile no:</b>';
       echo             '</td>';
       echo             '<td>';
       echo                 '<b>';
       echo                     $b["phone_number"];
       echo                 '</b>';
       echo             '</td>';
       echo         '</tr>';
       echo         '<tr>';
       echo             '<td>';
       echo                 '<b>Wallet ballance:</b>';
       echo             '</td>';
       echo             '<td>';
       echo                 '<b>';
       echo                    'Rs.' .$d["balance"];
       echo                 '</b>';
       echo             '</td>';
       echo         '</tr>';
       echo      '</tbody>';
       echo   '</table>';
       echo  '</div>';
       echo'</div>';
?>
<br>
    <div class="container">
            <br>
        <form action="" method="POST">
            <button class="filled-button" style="float: right!important; background-color: #f33f3f;
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
    cursor: pointer;" name="edit">Edit</button>
        </form>

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
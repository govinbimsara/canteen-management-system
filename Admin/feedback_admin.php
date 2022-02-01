<?php
include('header.php');
include_once "includes/dbh.inc.php";
?>
<?php
// $servername = "localhost";
// $dBUsername = "root";
// $dBpassword = "";
// $dBname = "test2";

// $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);

// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
$query = "SELECT * FROM feedback ORDER BY feedback_id DESC";
$result = mysqli_query($conn, $query);
// 
?>
<!DOCTYPE html>
<html>


<head>

    <!-- <link rel="stylesheet" href="#"> -->
</head>

<body>
   
    </div>
    </div>
    <div class="round">



        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>




            <div class="comments-box p-3 mb-2">
                <h6 align="right"><?php echo $rows['time']; ?></h6>
                <h5><?php echo $rows['username']; ?></h5>
                <h4><?php echo $rows['topic']; ?></h4>


                <p><?php echo $rows['description']; ?></p>


            </div>




        <?php
        }
        ?>

    </div>
</body>

</html>
<?php
include('scripts.php');
include('footer.php');
?>
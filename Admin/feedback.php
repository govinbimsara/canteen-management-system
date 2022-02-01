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
$query = "SELECT * FROM feedback";
$result = mysqli_query($conn, $query);
// 
?>
<!DOCTYPE html>
<html>


<head>

    <!-- <link rel="stylesheet" href="#"> -->
</head>

<body>
    <!-- <div class="round1">
                            <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            
              
              <p class="text-white">Select Topic</p>
              <select class="custom-select">
                <option value="0">Select Topic</option>
                <option value="1">About Food</option>
                <option value="2">About Service</option>
                <option value="3">About Hygiene</option>
                
              </select>
            </div>
          </div>
        </div> -->
    </div>
    </div>
    <div class="round">



        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>




            <div class="comments-box p-3 mb-2">
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
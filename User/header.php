<?php
  session_start();
?>
<?php
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}

echo "<p>";
// print_r($_SESSION['cart']);
echo "</p>";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>CAFÉ ROMÉ</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--



-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/banner.css"> 
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/css/banner.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
      <div class="jumper">
          <div></div>
          <div></div>
          <div></div>
      </div>
  </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>SCIENCE <em>CAFE</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="food.php">Our Products</a>
              </li>
              
              <?php
                if(isset($_SESSION["username"])){
                
                echo '<li class="nav-item">
                  <a class="nav-link" href="profile.php">Profile</a>
                </li>';
                
                  echo '<li class="nav-item">
                  <a class="nav-link" href="feedback_user.php">Feedback</a>
                </li>';

                echo '<li class="nav-item">
                  <a class="nav-link" href="cart.php">Cart</a>
                </li>';

                echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span>
                    Orders
                </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="orders-current.php">Current Orders</a>
                <a class="dropdown-item" href="orders-past.php">Past Orders</a>
            </div>
              </li>';

                echo '<li class="nav-item">
                  <a class="nav-link" href="includes/logout.inc.php">Logout</a>
                </li>';
                }
                else{
                  echo '<li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>';
                }
              ?>
              
              
            </ul>
          </div>
        </div>
      </nav>
    </header>
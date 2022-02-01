<?php
  session_start();
  ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Owner - Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
    <!-- http://api.jqueryui.com/datepicker/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
    

    <!-- search box -->


</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="index.php">
                    <h1 class="tm-site-title mb-0">Owner Panel</h1>
                </a>
                <?php
                if(isset($_SESSION["username"])){
                    echo '
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span>
                                    Orders <!--<i class="fas fa-angle-down"></i> -->
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="orders-process.php">Processing</a>
                                <a class="dropdown-item" href="orders-ready.php">Ready</a>
                                <a class="dropdown-item" href="orders-accepted.php">Accepted</a>
                                <a class="dropdown-item" href="orders-completed.php">Completed</a>
                                <a class="dropdown-item" href="orders-cancelled.php">Canceled</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="orders.php">
                                <i class="fas fa-shopping-cart"></i>
                                Orders
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="reload.php">
                                <i class="far fa-file-alt"></i>
                                Reload
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Reports <!--<i class="fas fa-angle-down"></i> -->
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Sales report</a>
                                <a class="dropdown-item" href="report-weekly.php">Weekly Report</a>
                                <a class="dropdown-item" href="report-monthly.php">Montly Report</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="Addproduct.php">
                                <i class="fas fa-shopping-cart"></i>
                            Add Products
                            </a>
                        </li> -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>
                                <span>
                                    Products <!--<i class="fas fa-angle-down"></i> -->
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="Addproduct.php">Add products</a>
                                <a class="dropdown-item" href="add-brand.php">Add brand</a>
                            </div>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="add-brand.php">
                                <i class="far fa-file-alt"></i>
                                Brand
                            </a>
                        </li> -->
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-file-alt"></i>
                                <span>
                                    Menu <!--<i class="fas fa-angle-down"></i> -->
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="breakfastview.php">Breakfast</a>
                                <a class="dropdown-item" href="lunchview.php">Lunch</a>
                                <a class="dropdown-item" href="#">Other</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-comment"></i>
                                <span>
                                    Feedback <!--<i class="fas fa-angle-down"></i> -->
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="feedback_owner.php">Feedback</a>
                                <a class="dropdown-item" href="ratings.php">Reviews</a>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="feedback.php">
                                <i class="far fa-comment"></i>
                                Feedback
                            </a>
                        </li> -->
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-cog"></i>
                                <span>
                                    Settings <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Billing</a>
                                <a class="dropdown-item" href="#">Customize</a>
                            </div>
                        </li> -->
                    </ul>';}
                    ?>
                    <?php
                        if(isset($_SESSION["username"])){
                            echo    '<ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link d-block" href="includes/logout.inc.php">
                                            Owner, <b>Logout</b>
                                        </a>
                                    </li>
                                </ul>';
                        }
                    ?>
                </div>
            </div>

        </nav>

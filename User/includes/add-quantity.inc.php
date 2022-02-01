<?php
    session_start();
    if(isset($_POST["submit"]))
    {   $pID = $_POST["pID"];

        if(isset($_SESSION['cart'][$pID])){
            $_SESSION['cart'][$pID] += 1;
        }
    }
    header("location: ../cart.php?error=addedtocart");
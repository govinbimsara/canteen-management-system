<?php
    session_start();
    if(isset($_POST["submit"]))
    {   $pID = $_POST["pID"];

        if(isset($_SESSION['cart'][$pID])){
            $_SESSION['cart'][$pID] -= 1;
            if($_SESSION['cart'][$pID]<=0){
                unset($_SESSION['cart'][$pID]);
            }
        }
    }
    header("location: ../cart.php?error=removedfromcart");
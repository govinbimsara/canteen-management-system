<?php
if (isset($_POST['submit'])) {
    $foodName = $_POST['food_name'];
    $foodQty = $_POST['qty'];
    $foodDescription = $_POST['food_description'];
    $foodPrice = $_POST['price'];

    include_once "dbh.inc.php";
    include_once "myfunction01.inc.php";


    if (emptyaddFood($foodName, $foodQty, $foodDescription, $foodPrice) !== false) {
        header("location: ../admin/breakfast.php?error=emptyinput");
        exit();
    } else {
        creatMenu($conn, $foodName, $foodQty, $foodDescription, $foodPrice);
        header("location: ../admin/breakfast.php?error=successful");
    }
} else {
    header("location: ../admin/breakfast.php?error=1");
}

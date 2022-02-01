<?php

if (isset($_POST["submit"])) {

    $brandname = $_POST['brand_name'];
    $brandDescription = $_POST['brand_description'];


    include_once "dbh.inc.php";
    include_once "functions1.inc.php";

    if (emptyInput($brandname, $brandDescription) !== false) {
        header("location: ../add-brand.php?error=emptyinput");
        exit();
    }

    creatbrand($conn, $brandname, $brandDescription);
} else {
    header("location: ../add-brand.php?error=1");
}

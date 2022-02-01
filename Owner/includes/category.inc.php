<?php

if (isset($_POST["submit"])) {

    $categoryname = $_POST["category_name"];


    include_once "dbh.inc.php";
    include_once "functions.inc.php";

    if (emptyInputCategory($categoryname) !== false) {
        header("location: ../add-category.php?error=emptyinput");
        exit();
    }

    creatcategory($conn, $categoryname);
} else {
    header("location: ../add-category.php?error=1");
}

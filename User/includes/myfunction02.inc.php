<?php

function emptyInput($brandname, $brandDescription)
{
    $result = '';

    if (empty($brandname) || empty($brandDescription)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function creatbrand($conn, $brandname, $brandDescription)
{

    //Inserting into "brand" table
    $sql = "INSERT INTO brand(brand_name,brand_description) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/add-brand.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $brandname, $brandDescription);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../admin/add-brand.php?error=noerror");
}

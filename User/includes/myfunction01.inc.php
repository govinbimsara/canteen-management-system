<?php

function emptyInput($categoryname)
{
    $result = '';

    if (empty($categoryname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function creatcategory($conn, $categoryname)
{

    //Inserting into "product" table
    $sql = "INSERT INTO categories(category_name) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/add-category.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $categoryname);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../admin/add-category.php?error=noerror");
}
?>

function emptyaddFood($foodName, $foodQty, $foodDescription, $foodPrice)
{
$result = '';

if (empty($foodName) || empty($foodQty) || empty($foodDescription) || empty($foodPrice)) {
$result = true;
} else {
$result = false;
}
return $result;
}
//write function for add product
function creatMenu($conn, $foodName, $foodQty, $foodDescription, $foodPrice)
{

//Inserting into "product" table
$sql = "INSERT INTO breakfast (food_name,qty,food_description,price) VALUES (?,?,?,?);";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
header("location: ../admin/brakfast.php?error=stmtfailed");
exit();
}

mysqli_stmt_bind_param($stmt, "sssi", $foodName, $foodQty, $foodDescription, $foodPrice);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
}
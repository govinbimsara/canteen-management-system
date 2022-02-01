<?php
function emptyaddProducts($productName, $price, $productdescription, $qty, $category, $brand)
{
    $result = '';

    if (empty($productName)  || empty($price) || empty($productdescription) || empty($qty) || empty($category) || empty($brand)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//write function for add product
function creatproduct($conn, $productName, $productdescription, $qty, $price, $category, $brand, $images, $availability, $menuid)
{

    //Inserting into "product" table
    $sql = "INSERT INTO product (product_name, product_description, qty, price,category_id,brand_id,product_image, availability,menu_id) VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add-product.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssiiiissi", $productName, $productdescription, $qty, $price, $category, $brand, $images, $availability, $menuid);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

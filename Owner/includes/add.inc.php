<?php
include_once "dbh.inc.php";
include_once "myfunction.inc.php";


if (isset($_POST['submit'])) {


  //get the data from form
  $productName = $_POST['product_name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $productdescription = $_POST['product_description'];
  $category = $_POST['category_id'];
  $brand = $_POST['brand_id'];
  $images = $_FILES['product_image']['name'];
  $availability = $_POST['availability'];
  $menuid = $_POST['menu_id'];


  $targetDir = "uploads/";
  $fileName = basename($_FILES["product_image"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
  move_uploaded_file($_FILES["product_image"]["tmp_name"], $targetFilePath);

  if (emptyaddProducts($productName, $productdescription, $qty, $price, $category, $brand, $images, $availability, $menuid) !== false) {
    header("location: ../AddProduct.php?error=emptyinput");
    exit();
  } else {

    creatproduct($conn, $productName, $productdescription, $qty, $price, $category, $brand, $images, $availability, $menuid);
    header("location: ../AddProduct.php?error=successful");
  }
} else {
  header("location: ../AddProduct.php?error=1");
}

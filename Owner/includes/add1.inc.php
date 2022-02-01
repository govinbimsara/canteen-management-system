<?php

if (isset($_POST['submit'])) {

  //get the data from form
  $productName = $_POST['product_name'];
  $brandname = $_POST['brand_name'];
  $price = $_POST['price'];
  $qty = $_POST['qty'];
  $productdescription = $_POST['product_description'];
  //$statusMsg = '';
  //$backlink = '<a herf="./">Go to back</a>';

  //$targetDir = 'uploads/';
  //$filename = basename($_FILES["file"]["name"]);
  //$targetFiePath = $targetDir . $filename;
  //$fileType = pathinfo($targetFiePath, PATHINFO_EXTENSION);

  //if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
  // $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
  // if (!file_exists($targetFilePath)) {
  //if (in_array($fileType, $allowTypes)) {
  //if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
  // $insert = $db->$query("INSERT INTO image(image_name) VALUES('" . $filename . "',NOW())");
  //if ($insert) {
  // $statusMsg = "The file<b>." . $filename . "</b>has been uploaded successfully" . $backlink;
  //} else {
  //$statusMsg = "file upload failed,please try again." . $backlink;
  // }
  //} else {
  // $statusMsg = "sorry,there was an error uploading your file." . $backlink;
  //}
  //} else {
  //$statusMsg = "Sorry,only JPG,JPEG,GIF & PDF files are allowed to upload." . $backlink;
  //}
  //} else {
  // $statusMsg = "The file <b>." . $filename . "</b> is already exists." . $backlink;
  //}
  //} else {
  //$statusMsg = 'please select a file to upload.' . $backlink;
  //}
  //echo $statusMsg;
  include_once "dbh.inc.php";
  include_once "functions.inc.php";


  if (emptyaddProducts($productName, $brandname, $price, $qty, $productdescription) !== false) {
    header("location: ../add-product.php?error=emptyinput");
    exit();
  } else {
    creatproduct($conn, $productName, $brandname, $price, $qty, $productdescription);
    header("location: ../add-product.php?error=successful");
  }
} else {
  header("location: ../add-product.php?error=1");
}
//if (isset($_POST['submit']) && isset($_FILES['image'])) {
//echo "Hello";
//} else {
//header("Location:../admin/add-product.php");
//}

<?php
$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBname = "test2";

$conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);
$s = mysqli_query($conn, "SELECT * FROM product");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
while ($r = mysqli_fetch_array($s)) {
?>
    <option value="<?= $r['product_id'] ?>"><?php echo $r['product_name']; ?></option>
<?php
}

?>
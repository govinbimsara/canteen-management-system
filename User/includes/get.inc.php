<?php
$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBname = "test2";

$conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);
$s = mysqli_query($conn, "SELECT brand_id FROM brand INNER JOIN product ON brand.brand_id=product.brand_id");
//  $s1 = mysqli_query($conn, "SELECT brand_name FROM brand JOIN product ON(product.brand_id = brand.brand_name)");
$result = mysqli_query($conn, $s);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


}
<?php
if (mysqli_num_rows($result) > 0) {
    while ($r = mysqli_fetch_array($result)) {
?>
        <option value="<?= $r['brand_name'] ?>"><?php echo $r['brand_name']; ?></option>
<?php
    }
}
?>
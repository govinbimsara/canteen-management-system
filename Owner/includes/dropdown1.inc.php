<?php
$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBname = "test2";

$conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);
$s = mysqli_query($conn, "SELECT * FROM brand");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<select name="brand_id" id="brand_id">
    <?php
    while ($r = mysqli_fetch_array($s)) {
    ?>
        <option value="<?= $r['brand_id'] ?>"><?php echo $r['brand_name']; ?></option>
    <?php
    }

    ?>
</select>
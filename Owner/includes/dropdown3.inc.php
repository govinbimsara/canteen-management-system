<?php
$servername = "localhost";
$dBUsername = "root";
$dBpassword = "";
$dBname = "test2";

$conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);
$s = mysqli_query($conn, "SELECT * FROM menu_identifier");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<select id="menu_id" name="menu_id">
    <?php

    while ($r = mysqli_fetch_array($s)) {
    ?>

        <option value="<?= $r['menu_id'] ?>"><?php echo $r['name']; ?></option>


    <?php

    }
    ?>
</select>
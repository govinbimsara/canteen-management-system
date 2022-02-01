<a href="#"><?php echo '<img src="img/' . $rows['product_image'] . '" width="100px;" height="100px;"alt="product_image">' ?> </a>


<?php
// if (isset($_SESSION["username"])) {
//     echo '<form action="includes/view.inc.php" method="POST">
//             <input type="hidden" name="pID" id="pID" value=' . $rows["product_id"] . '>
//             <input type="submit" name="submit" value="GO">
//     </form>';
// }

// if (isset($_SESSION["username"])) {
//     echo '<form action="includes/add-to-cart.inc.php" method="POST">
//         <input type="hidden" name="pID" id="pID" value=' . $rows["product_id"] . '>
//         <input type="submit" name="submit" value="Add to Cart">
//     </form>';
// }

?>

<?php
// if (isset($_SESSION["username"])) {
//     echo '<form action="includes/view.inc.php" method="POST">
//             <input type="hidden" name="pID" id="pID" value=' . $rows["product_id"] . '>
//             <input type="submit" name="submit" value="GO">
//     </form>';
// }

if (isset($_SESSION["username"])) {
    echo '<form action="includes/add-to-cart.inc.php" method="POST">
                                                    <input type="hidden" name="pID" id="pID" value=' . $rows["product_id"] . '>
                                                    <input type="submit" name="submit" value="Add to Cart">
                                                </form>';
}

?>
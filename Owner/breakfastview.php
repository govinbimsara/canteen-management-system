<?php
include('header.php');
?>
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">

                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">PRODUCT ID</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">IN STOCK</th>
                                <th scope="col">DESCRIPTION</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $servername = "localhost";
                            $dBUsername = "root";
                            $dBpassword = "";
                            $dBname = "test2";

                            $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);

                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $q = "select * from product where category_id='1' order by product_id asc";
                            $result = mysqli_query($conn, $q);
                            while ($rs = mysqli_fetch_array($result)) {
                                $prodid = $rs['product_id'];
                                $prodname = $rs['product_name'];
                                $price = $rs['price'];
                                $qty = $rs['qty'];
                                $productdescription = $rs['product_description'];
                                echo "<tr class='tb1'>";
                                echo "<td>" . $prodid . "</td>";
                                echo "<td>" . $prodname . "</td>";
                                echo "<td>Rs." . $price . "</td>";
                                echo "<td>" . $qty . "</td>";
                                echo "<td>" . $productdescription . "</td>";
                                echo "<td> <a href='edit-product.php?id=$prodid' id='popedit'>Update</a>  |  <a href='delete-product.php?id=$prodid' id='popedit'>Delete</a>  </td>";
                                echo "</tr>";
                            }
                            ?>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- table container -->

            </div>
        </div>
        </div>
        </div>
        <?php
        include('scripts.php');
        include('footer.php');
        ?>
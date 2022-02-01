<?php
include('header.php');
include_once "includes/dbh.inc.php";
?>
<?php
$prodid = $_GET['id'];
$q = "select * from product where product_id='$prodid'";
$result = mysqli_query($conn, $q);

while ($rs = mysqli_fetch_array($result)) {
    $productName = $rs['product_name'];
    $price = $rs['price'];
    $qty = $rs['qty'];
    $productdescription = $rs['product_description'];
    $category = $rs['category_id'];
    $brand = $rs['brand_id'];
}


?>



<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form method="post" action="process.php?did=<?php echo $prodid; ?>">
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="name" name="product_name" type="text" value="<?php echo $productName; ?>" class="form-control validate" required />
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name">Category</label>
                                    <select name="ecategory" id="ecategory">
                                        <option><?php echo $category; ?></option>
                                        <?php
                                        while ($rs = mysqli_fetch_array($result)) {
                                            $category = $rs['category_name'];

                                            $query = "select * from category where category_id='$category'";
                                            $res = mysqli_query($conn, $query);


                                            $r = mysqli_fetch_array($res);

                                            $catname = $r['category_name'];

                                            echo "<option>" .  $catname . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Brand</label>
                                    <select name="brand" id="brand">
                                        <option><?php echo $brand; ?></option>
                                    </select>
                                </div>


                                <div class="form-group mb-3">
                                    <label for="description">Product Description</label>
                                    <textarea name="product_description" class="form-control validate" rows="3" required><?php echo  $productdescription; ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="stock">Units In Stock
                                        </label>
                                        <input id="qty" name="qty" type="text" value="<?php echo  $qty; ?>" class="form-control validate" required />
                                    </div>
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="price">Price
                                        </label>
                                        <input id="price" name="price" type="text" value="<?php echo  $price; ?>" class="form-control validate" required />
                                    </div>

                                </div>


                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">

                        </div>

                        <button type="submit" class="btn btn-primary btn-block text-uppercase">DELETE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('scripts.php');
    include('footer.php');
    ?>
    <script>
        $(function() {
            $("#expire_date").datepicker({
                defaultDate: "3/22/2021"
            });
        });
    </script>
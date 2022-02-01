<!DOCTYPE html>
<html>

<head>
    <title>Update, Delete & Reserve Products</title>
</head>
<style type="text/css">
    body {
        background: #3B5998;
    }
</style>

<body>
    <?php
    $servername = "localhost";
    $dBUsername = "root";
    $dBpassword = "";
    $dBname = "test2";

    $conn = mysqli_connect($servername, $dBUsername, $dBpassword, $dBname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function edit_product($conn, $prodid, $productname, $price, $qty, $productdescription, $category, $brand, $images)
    {
        $q = "update product set  product_name='$productname',price='$price',qty='$qty',product_description='$productdescription',category_id='$category',brand_id='$brand',product_image='$images', where prod_id='$prodid'";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
		alert('PRODUCT UPDATED SUCCESSFULLY');
		window.location = 'add-product.php';
		</script>";
        } else {
            echo "<script language='javascript'>
		alert('Error While Updating Products');
		window.location = 'edit-product.php';
		</script>";
        }
    }
    function delete_product($conn, $id)
    {
        $q = "delete from product where product_id='$id'";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
    	alert('PRODUCT DELETED SUCCESSFULLY');
    	window.location = 'add-product.php';
    	</script>";
        } else {
            echo "<script language='javascript'>
    	alert('Error While Deleting Products');
    	window.location = 'delete-product.php';
    	</script>";
        }
    }
    function fetch_quantity($conn, $productid, $no_copies)
    {
        $q = "select * from product where product_id='$productid'";
        $result = mysqli_query($conn, $q);
        while ($rs = mysqli_fetch_array($result)) {
            $qtty = $rs['qty'];
            $ubk_qty = $qtty - $no_copies;
            if ($ubk_qty < 0) {
                echo "<script language='javascript'>
    	alert('PRODUCT IS OUT OF STOCK');
    	window.location = 'index.php';
    	</script>";
            } else {
                $q = "update product set qty='$ubk_qty' where product_id='$productid'";
                mysqli_query($conn, $q);
            }
        }
    }
    function reserve_product($conn, $rsrv_name, $prodid, $prodtle, $dateissue, $pickup, $no_copies)
    {
        $q = "INSERT INTO reserve (reserve_name,prodid,prodtle,dateissue,pickup,no_copies) VALUES
    	('" . $rsrv_name . "','" . $prodid . "','" . $prodtle . "','" . $dateissue . "','" . $pickup . "','" . $no_copies . "')";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
    	alert('PRODUCT RESERVED SUCCESSFULLY');
    	window.location = 'viewreserved.php';
    	</script>";
        } else {
            echo "<script language='javascript'>
    	alert('Error Reserving Product');
    	window.location = 'viewreserved.php';
    	</script>";
        }
    }
    function fetch_quantity_return($conn, $productid, $no_copies)
    {
        $q = "select * from product where product_id='$productid'";
        $result = mysqli_query($conn, $q);
        while ($rs = mysqli_fetch_array($result)) {
            $qtty = $rs['qty'];
            $ubk_qty = $qtty + $no_copies;
            $q = "update product set qty='$ubk_qty' where product_id='$productid'";
            mysqli_query($conn, $q);
        }
    }
    function fetch_quantity_return_reserve($conn, $productid, $no_copies)
    {
        $q = "select * from product where product_id='$productid'";
        $result = mysqli_query($conn, $q);
        while ($rs = mysqli_fetch_array($result)) {
            $qtty = $rs['qty'];
            $ubk_qty = $qtty + $no_copies;
            $q = "update product set qty='$ubk_qty' where product_id='$productid'";
        }
    }
    if (isset($_GET['idsr'])) {
        $sid = $_GET['idsr'];
        $copy = $_GET['copyr'];
        $rbid = $_GET['rbidr'];
        fetch_quantity_return($conn, $sid, $copy);
        $q = "delete from reserve where reserve_id='$rbid'";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
    	alert('PRODUCT PICKED SUCCESSFULLY');
    	window.location = 'viewreserved.php';
    	</script>";
        } else {
            echo "<script language='javascript'>
    	alert('Error Returning penalty');
    	window.location = 'viewreserved.php';
    	</script>";
        }
    }
    if (isset($_POST['rid'], $_POST['rname'], $_POST['rbkids'], $_POST['rbktl'], $_POST['rdateis'], $_POST['rd2turn'], $_POST['rnocopy'])) {
        $bid = $_POST['rid'];
        $bname = $_POST['rname'];
        $prodid = $_POST['rbkids'];
        $prodtitle = $_POST['rbktl'];
        $dateissued = $_POST['rdateis'];
        $datereturned = $_POST['rd2turn'];
        $no_copies = $_POST['rnocopy'];
        fetch_quantity($conn, $prodid, $no_copies);
        reserve_product($bid, $bname, $prodid, $prodtitle, $dateissued, $datereturned, $no_copies);
    }
    if (isset($_GET['did'])) {
        $prodid = $_GET['did'];
        delete_product($conn, $prodid);
    }
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['category_id'], $_POST['brand_id'], $_POST['price'], $_POST['qty'], $_POST['product_description'])) {
        $prodid = $_POST['product_id'];
        $productname = $_POST['product_name'];
        $category = $_POST['category_id'];
        $brand = $_POST['brand_id'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $productdescription = $_POST['product_description'];

        edit_product($conn, '', $prodid,  $productname, $category,  $brand, $price, $qty, $productdescriptions);
    }

    ?>
</body>

</html>
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
    include_once "includes/dbh.inc.php";
    function edit_product($conn, $eprodid, $eproductName,  $eprice, $eqty,  $eproductdescription, $ecategory, $ebrand)
    {
        $q = "update product set product_id='$eprodid',product_name='$eproductName', price=' $eprice',product_description=' $eproductdescription',qty='$eqty',category_id='$ecategory ' brand_id=' $ebrand ' where product_id='$eprodid'";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
		alert('PRODUCT UPDATED SUCCESSFULLY');
		window.location = 'AddProduct.php';
		</script>";
        } else {
            echo "<script language='javascript'>
		alert('Error While Updating Products');
		window.location = 'edit-product.php';
		</script>";
        }
    }
    if (isset($_POST['productid'], $_POST['eproductname'], $_POST['ecategoryid'], $_POST['eqty'], $_POST['ebrandid'], $_POST['eproductdescription'])) {
        $eprodid = $_POST['eproductid'];
        $eproductName = $_POST['eproductname'];
        $ecategory = $_POST['ecategoryid'];
        $eqty = $_POST['eqty'];
        $ebrand = $_POST['ebrandid'];
        $eproductdescription = $_POST['eproductdescription'];
        edit_product($conn, '', $eprodid, $eproductName, $ecategory, $eqty,  $ebrand,  $eproductdescription);
    }
    function delete_product($conn, $prodid)
    {
        $q = "delete from product where product_id='$prodid'";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
		alert('PRODUCT DELETED SUCCESSFULLY');
		window.location = 'AddProduct.php';
		</script>";
        } else {
            echo "<script language='javascript'>
		alert('Error While Deleting Products');
		window.location = 'AddProduct.php';
		</script>";
        }
    }
    function fetch_quantity($conn, $prodid, $no_copies)
    {
        $q = "select * from tblproducts where prod_id='$prodid'";
        $result = mysqli_query($conn, $q);
        while ($rs = mysqli_fetch_array($result)) {
            $qtty = $rs['prod_qty'];
            $ubk_qty = $qtty - $no_copies;
            if ($ubk_qty < 0) {
                echo "<script language='javascript'>
		alert('PRODUCT IS OUT OF STOCK');
		window.location = 'index.php';
		</script>";
            } else {
                $q = "update tblproducts set prod_qty='$ubk_qty' where prod_id='$prodid'";
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
    function fetch_quantity_return($conn, $prodid, $no_copies)
    {
        $q = "select * from tblproducts where prod_id='$prodid'";
        $result = mysqli_query($conn, $q);
        while ($rs = mysqli_fetch_array($result)) {
            $qtty = $rs['prod_qty'];
            $ubk_qty = $qtty + $no_copies;
            $q = "update tblproducts set prod_qty='$ubk_qty' where prod_id='$prodid'";
            mysqli_query($conn, $q);
        }
    }
    function fetch_quantity_return_reserve($conn, $prodid, $no_copies)
    {
        $q = "select * from tblproducts where prod_id='$prodid'";
        $result = mysqli_query($conn, $q);
        while ($rs = mysqli_fetch_array($result)) {
            $qtty = $rs['prod_qty'];
            $ubk_qty = $qtty + $no_copies;
            $q = "update tblproducts set prod_qty='$ubk_qty' where prod_id='$prodid'";
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

    ?>
</body>


</html>
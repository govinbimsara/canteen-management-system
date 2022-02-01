
    <?php
    include_once "dbh.inc.php";
    // function edit_product($conn, $prodid, $prodname, $prodctry, $prodqty)
    // {
    //     $q = "update tblproducts set prod_id='$prodid', prod_name='$prodname',prod_ctry='$prodctry',prod_qty='$prodqty' where prod_id='$prodid'";
    //     if (mysqli_query($conn, $q)) {
    //         echo "<script language='javascript'>
    // 	alert('PRODUCT UPDATED SUCCESSFULLY');
    // 	window.location = 'index.php';
    // 	</script>";
    //     } else {
    //         echo "<script language='javascript'>
    // 	alert('Error While Updating Products');
    // 	window.location = 'edit.php';
    // 	</script>";
    //     }
    // }
    function delete_product($conn, $prodid)
    {
        $q = "delete from product where product_id='$prodid'";
        if (mysqli_query($conn, $q)) {
            echo "<script language='javascript'>
		alert('PRODUCT DELETED SUCCESSFULLY');
		window.location = 'add-product.php';
		</script>";
        } else {
            echo "<script language='javascript'>
		alert('Error While Deleting Products');
		window.location = 'add-product.php';
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
    // if (isset($_GET['idsr'])) {
    //     $sid = $_GET['idsr'];
    //     $copy = $_GET['copyr'];
    //     $rbid = $_GET['rbidr'];
    //     fetch_quantity_return($conn, $sid, $copy);
    //     $q = "delete from reserve where reserve_id='$rbid'";
    //     if (mysqli_query($conn, $q)) {
    //         echo "<script language='javascript'>
    // 	alert('PRODUCT PICKED SUCCESSFULLY');
    // 	window.location = 'viewreserved.php';
    // 	</script>";
    //     } else {
    //         echo "<script language='javascript'>
    // 	alert('Error Returning penalty');
    // 	window.location = 'viewreserved.php';
    // 	</script>";
    //     }
    // }
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
    if (isset($_POST['eprodid'], $_POST['eprodname'], $_POST['ecategory'], $_POST['equantity'])) {
        $prodid = $_POST['eprodid'];
        $prodname = $_POST['eprodname'];
        $prodctry = $_POST['ecategory'];
        $prodqty = $_POST['equantity'];
        edit_product($conn, '', $prodid, $prodname, $prodctry, $prodqty);
    }
    ?>

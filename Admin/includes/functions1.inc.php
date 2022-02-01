<?php

function emptyInputSignup($firstname, $lastname, $nic, $email, $mobile, $username, $pwd,  $repeatpwd)
{
    $result = '';

    if (empty($firstname) || empty($lastname) || empty($nic) || empty($email) || empty($mobile) || empty($username) || empty($pwd) || empty($repeatpwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidUserName($username)
{
    $result = '';
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($pwd, $repeatpwd)
{
    if ($pwd !== $repeatpwd) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameTaken($conn, $username, $mobile)
{
    $sql = "SELECT * FROM users WHERE username = ? OR phone_number = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../creat-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $username, $mobile);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function creatUser($conn, $firstname, $lastname, $nic, $email, $mobile, $username, $pwd, $staffstudent)
{

    //Inserting into "users" table
    $sql = "INSERT INTO users (first_name, last_name, nic, email, phone_number, username, password) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../creat-account.php?error=stmtfailed");
        exit();
    }

    $hashedpd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssiss", $firstname, $lastname, $nic, $email, $mobile, $username, $hashedpd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    //Finish quary


    //Inserting into "customers" table
    $sql1 = "INSERT INTO customer (user_id, staff_or_student) VALUES (?,?);";
    $stmt1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt1, $sql1)) {
        header("location: ../creat-account.php?error=stmtfailed");
        exit();
    }

    $last_entry1 = mysqli_insert_id($conn);
    mysqli_stmt_bind_param($stmt1, "is", $last_entry1, $staffstudent);
    mysqli_stmt_execute($stmt1);

    mysqli_stmt_close($stmt1);
    //Finish quary

    //Inserting into "wallet" table
    $sql2 = "INSERT INTO wallet (user_id, customer_id) VALUES (?,?);";
    $stmt2 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header("location: ../creat-account.php?error=stmtfailed");
        exit();
    }

    $last_entry2 = mysqli_insert_id($conn);
    mysqli_stmt_bind_param($stmt2, "is", $last_entry1, $last_entry2);
    mysqli_stmt_execute($stmt2);

    mysqli_stmt_close($stmt2);
    //header("location: ../signup.php?error=noerror");

    //Finish quary

    //Updating "customer table

    $sql3 = "UPDATE customer SET wallet_id = ? WHERE customer_id = ?;";
    $stmt3 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt3, $sql3)) {
        header("location: ../creat-account.php?error=stmtfailed");
        exit();
    }

    $last_entry3 = mysqli_insert_id($conn);
    mysqli_stmt_bind_param($stmt3, "ii", $last_entry3, $last_entry2);
    mysqli_stmt_execute($stmt3);

    mysqli_stmt_close($stmt3);
    header("location: ../creat-account.php?error=noerror");
    //Finish quary
}

function emptyInputLogin($username, $pwd)
{
    $result = '';

    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{

    $usernameTaken = usernameTaken($conn, $username, $username);

    if ($usernameTaken == false) {
        header("location: ../login.php?error=wrongcredentials");
        exit();
    }

    $pwdHashed = $usernameTaken["password"];
    $pwdcheck = password_verify($pwd, $pwdHashed);

    if ($pwdcheck == false) {

        header("location: ../login.php?error=wrongpassword");
        exit();
    } else if ($pwdcheck == true) {

        session_start();
        $_SESSION["userid"] = $usernameTaken["user_id"];
        $_SESSION["username"] = $usernameTaken["username"];
        header("location: ../food.php");
        exit();
    }
}
function profileDetails($conn, $username)
{
    $sql = "SELECT * FROM users WHERE username = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=profileerror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        header("location: index.php?error=profileerror");
        exit();
    }
    mysqli_stmt_close($stmt);
}

function walletDetails($conn, $userid)
{
    $sql = "SELECT * FROM wallet WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: index.php?error=walleterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        header("location: index.php?error=profileerror");
        exit();
    }
    mysqli_stmt_close($stmt);
}


//Indunil Function starts.....

function emptyInputCategory($categoryname)
{
    $result = '';

    if (empty($categoryname)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function creatcategory($conn, $categoryname)
{

    //Inserting into "categories" table
    $sql = "INSERT INTO categories(category_name) VALUES (?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/add-category.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $categoryname);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../admin/add-category.php?error=noerror");
}

function emptyInput($brandname, $brandDescription)
{
    $result = '';

    if (empty($brandname) || empty($brandDescription)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function creatbrand($conn, $brandname, $brandDescription)
{

    //Inserting into "brand" table
    $sql = "INSERT INTO brand(brand_name,brand_description) VALUES (?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/add-brand.php?error=stmtfailed");
        exit();
    }
    $last_entry1 = mysqli_insert_id($conn);
    mysqli_stmt_bind_param($stmt, "ss", $brandname, $brandDescription);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    header("location: ../admin/add-brand.php?error=noerror");
}
function emptyaddProducts($productName, $price, $qty, $productdescription)
{
    $result = '';

    if (empty($productName)  || empty($price) || empty($qty) || empty($productdescription)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
//write function for add product
function creatproduct($conn, $productName,  $price, $qty, $productdescription)
{

    //Inserting into "product" table
    $sql = "INSERT INTO product (category_id,brand_id,product_name, price, qty, product_description) VALUES (?,?,?,?,?,? );";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin/add-product.php?error=stmtfailed");
        exit();
    }
    $last_entry2 = mysqli_insert_id($conn);
    mysqli_stmt_bind_param($stmt, "iississ", $last_entry1, $last_entry2, $productName, $price, $qty, $productdescription);

    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
}

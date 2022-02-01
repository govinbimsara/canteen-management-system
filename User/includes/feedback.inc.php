<?php

if (isset($_POST["submit"])) {
    $topic = $_POST["topic"];
    $description = $_POST["message"];
    $uname = $_POST["uname"];

    include_once "dbh.inc.php";

    if (empty($description) || empty($uname)) {
        header("location: ../feedback.php?error=emptyinput");
        exit();
    }


    $sql = "INSERT INTO feedback (username, topic, description,time) VALUES (?,?,?,'" . date('Y-m-d H:m:s') . "');";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../feedback.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sss", $uname, $topic, $description);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../feedback.php?error=noerror");
} else {
    header("location: ../feedback.php?error=1");
}

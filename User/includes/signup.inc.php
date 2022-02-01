<?php

    if(isset($_POST["submit"])){
        
        $firstname = $_POST["first_name"];
        $lastname = $_POST["last_name"];
        $nic = $_POST["nic"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $username = $_POST["username"];
        $pwd = $_POST["password"];
        $repeatpwd = $_POST["password_confirm"];
        $staffstudent = $_POST["staffstudent"];

        include_once "dbh.inc.php";
        include_once "functions.inc.php";

        if(emptyInputSignup($firstname, $lastname, $nic, $email, $mobile, $username, $pwd,  $repeatpwd) !== false){
            header("location: ../creat-account.php?error=emptyinput");
            exit();
        }
        if(invalidUserName($username) !== false){
            header("location: ../creat-account.php?error=invalidusername");
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location: ../creat-account.php?error=invalidemail");
            exit();
        }
        if(passwordMatch($pwd, $repeatpwd) !== false){
            header("location: ../creat-account.php?error=passworddontmatch");
            exit();
        }
        if(usernameTaken($conn, $username, $mobile) !== false){
            header("location: ../creat-account.php?error=usernametaken");
            exit();
        }
        creatUser($conn, $firstname, $lastname, $nic, $email, $mobile, $username, $pwd, $staffstudent);

    }
    else{
        header("location: ../creat-account.php?error=1");
    }

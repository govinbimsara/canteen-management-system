<?php

    if(isset($_POST["reset-password-submit"])){

        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];

        if(empty($password) || empty($passwordRepeat)){

            header("location: ../reset-password.php?reset=emptypwd");
            exit();
        }else if($password != $passwordRepeat){
            header("location: ../reset-password.php?reset=pwdnotmacth");
            exit();
        }

        $currentDate = date("U");

        require 'dbh.inc.php';

        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../login.php?error=stmtpwdreseterror1");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $selector,$currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if(!$row = mysqli_fetch_assoc($result)){
                echo 'You need to re-submit your request';
                exit();
            }else{

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if($tokenCheck === false){
                    echo 'Token missmatch you need to re-submit your request';
                exit();
                }elseif($tokenCheck === true){
                    
                    $tokenEmail = $row["pwdResetEmail"];
                    $sql = "SELECT * FROM users WHERE email=?;";
                    $stmt = mysqli_stmt_init($conn);
                    
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo 'There was an error';
                        exit();
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);

                        if(!$row = mysqli_fetch_assoc($result)){
                            echo 'There was an error!!!';
                            exit();
                        }else{

                            $sql = "UPDATE users SET password=? WHERE email=?;";
                            $stmt = mysqli_stmt_init($conn);
                    
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                echo 'There was an error';
                                exit();
                            }
                            else{
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($conn);

                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    echo 'Error deleting token';
                                    exit();
                                }
                                else{
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("location: ../login.php?newpwd=passwordupdated");
                                }
                            }
                        }
                    }
                }

            }
        }

        
        

    }
    else{
        header("location: ../index.php");
    }
<?php
    // Changes the status of the whole Accepted list 

    if(isset($_POST["submit"])){

        include_once "dbh.inc.php";
        require_once '../vendor/autoload.php';

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

        $basic  = new \Vonage\Client\Credentials\Basic("0a31bb3a", "BYycMpslmL6VxMGW");
        $client = new \Vonage\Client($basic);

        $status = $_POST["status"];

        $sql = "SELECT * FROM orders WHERE order_status='Accepted'";
        $result = mysqli_query($conn, $sql) or die("Bad SQL: $sql");
        if($result){ 
            foreach($result as $row)
            {
                $username = $row['username'];
                $order_number = $row['order_number'];

                $sql2 = "SELECT * FROM users WHERE username='".$username."'";
                $result2 = mysqli_query($conn, $sql2) or die("Bad SQL: $sql2");
                $res1 = mysqli_fetch_assoc($result2);
                $mobile = $res1['phone_number'];
                $userEmail = $res1['email'];
                $subject = 'Your Order is '.$status.'';
                $mess = 'Your order No. '.$order_number.' is ' .$status. '.';

                if($status == 'Completed'){
                    $sql4 = "SELECT * FROM order_details WHERE order_number=".$order_number."";
                    $result4 = mysqli_query($conn, $sql4) or die("Bad SQL: $sql4");
                    if($result4){
                        foreach($result4 as $row4){
                            $quantity = $row4['quantity'];
                            $sales = $row4['price'];
                            $pid = $row4['product_id'];
                            
                            $sql6 = "SELECT * FROM fyp WHERE product_id = '$pid' ORDER BY id DESC LIMIT 1";
                            $result6 = mysqli_query($conn, $sql6) or die("Bad SQL: $sql6");
                            $row6 = mysqli_fetch_assoc($result6);
                            $id = $row6['id'];
                            $quantity = $quantity + $row6['quantity'];
                            $sales = $sales + $row6['sales'];

                            $sql5 = "UPDATE fyp SET quantity = ?, sales = ? WHERE id = ?;";

                            $stmt2 = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt2, $sql5)){
                                header("location: ../orders-ready.php?error=updatestmtfailed");
                                exit();
                            }

                            mysqli_stmt_bind_param($stmt2, "iii", $quantity, $sales, $id);
                            mysqli_stmt_execute($stmt2);
            
                            mysqli_stmt_close($stmt2);
                        }
                    }
                }


                $sql3 = "UPDATE orders SET order_status = ? WHERE order_status='Accepted';";
                $stmt = mysqli_stmt_init($conn);


                if(!mysqli_stmt_prepare($stmt, $sql3)){
                    header("location: ../orders-process.php?error=stmtfailed");
                    exit();
                }

                $messege = 'Your order No. '.$order_number.' is ' .$status. '. SciCafe';
                $ind = '94';
                $number = $ind.strval($mobile);

                // Send SMS 
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS(''.$number.'', 'Admin-ScienceCafe', $messege)
                // );
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS("94773515885", 'Admin-ScienceCafe', $messege)
                // );
                //Ends here

                
                $mail = new PHPMailer\PHPMailer\PHPMailer();

                try {
                    //Server settings
                    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'ldbafaunjfk@gmail.com';                     //SMTP username
                    $mail->Password   = 'fgyjak3gni';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('ldbafaunjfk@gmail.com', 'Admin-ScienceCafe');
                    $mail->addAddress($userEmail);     //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $mess;
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                    // header("location: ../reset-password.php?reset=success");
                } catch (PHPMailer\PHPMailer\Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }


                mysqli_stmt_bind_param($stmt, "s", $status);
                mysqli_stmt_execute($stmt);
            
                mysqli_stmt_close($stmt);
                header("location: ../orders-accepted.php?error=noerror");

            }
        }
    }else{
        header("location: ../orders-accepted.php?error=noentry");
        exit();
    }
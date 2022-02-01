<?php

    if(isset($_POST["reset-request-submit"])){
        
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "http://localhost/csproject1/creat-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

        $expires = date("U") + 1800;

        require 'dbh.inc.php';

        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';
        

        $userEmail = $_POST["email"];

        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../login.php?error=stmtpwdreseterror1");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../login.php?error=stmtpwdreseterror2");
            exit();
        }
        else{
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        // mysqli_close();

        $to = $userEmail;
        $subject = 'Reset you password for SCIENCE CAFE';
        $messege = '<p>We recieved a password reset request. The link to reset your password is below. If you did not make this request you can ignore it</p>';
        $messege .= '<p>Here is your password reset link: </br>';
        $messege .= '<a href="' . $url . '">' . $url . '</a></p>';

        //$mail = new PHPMailer(true);
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
        $mail->Body    = $messege;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        header("location: ../reset-password.php?reset=success");
    } catch (PHPMailer\PHPMailer\Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
else{
    header("location: ../index.php"); 
}

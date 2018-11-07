<?php
    if(isset($_POST['forgotPwd'])){
        require 'dbh.inc.php';
        $email = $_POST['mail'];
        $sql = $watestdb->query("SELECT * FROM users WHERE userEmail=".$watestdb->quote($email));
        
        if(!empty($email)){
            if ($sql->rowCount() > 0) {
                $token = bin2hex(random_bytes(16));

                require 'sendemail.inc.php';
                $mail->addAddress($email);
                $mail->Subject = "Notification on password reset!";
                $mail->WordWrap = 50;
                $mail->isHTML(true);
                $mail->Body = "Someone has request a password request on your account<br>Please ignore this email if you did not request this<br>Ortherwise, please click on the link below to reset your password <br> <a href='http://localhost:8080/loginSystem/includes/resetPwd.inc.php?mail=$email&token=$token'
                    >http://localhost:8080/loginSystem/includes/resetPwd.inc.php?mail=$email&token=$token<a/>";
                $mail->isHTML(true);

                if ($mail->send()) {
                    $sql = $watestdb->query("UPDATE users SET token=" . $watestdb->quote($token) . " WHERE userEmail=" . $watestdb->quote($email));
                    $sql = null;
                    $watestdb = null;
                    header("Location:../index.php?reset=emailsent");                
                    exit();
                } else {
                    $sql = null;
                    $watestdb = null;
                    header("Location:../forgotPwd.php?error=emailnotsent");
                    exit();
                }
            }  
            else {
            $sql = null;
            $watestdb = null;
            header("Location:../index.php?reset=emailsent");
            exit();
            }  
        } 
        else {
            $sql = null;
            $watestdb = null;
            header("Location:../forgotPwd.php?error=emptyfields");   
            exit();
        }
          
    } 
    else {
        header("Location:../forgotPwd.php?");
    exit();
    }
?>
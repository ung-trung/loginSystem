<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php';
    
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    
    if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location:../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location:../signup.php?error=invalidmailuid&uid");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location:../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location:../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location:../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }

//check user already in the databse
    else { 
        
        $selectNewUserEmail = $watestdb->prepare("SELECT userEmail FROM users WHERE userEmail = :email");
        $selectNewUserEmail->bindValue(":email",$email);
        $selectNewUserEmail->execute();

        $selectNewUserName = $watestdb->prepare("SELECT userName FROM users WHERE userName = :name");
        $selectNewUserName->bindValue(":name", $username);
        $selectNewUserName->execute();

//check both and every single email and name
    
        if ($selectNewUserEmail->rowCount() > 0 && $selectNewUserName->rowCount() > 0) {
            echo $selectNewUserEmail->rowCount()."<br>";
            echo $selectNewUserName->rowCount()."<br>";
            $selectNewUserEmail = null;
            $selectNewUserName = null;
            header("Location:../signup.php?error=usernameemailtaken");
            exit();
        } else if ($selectNewUserEmail->rowCount() > 0) {
            echo "email trung: ".$selectNewUserEmail->rowCount();

            $selectNewUserEmail = null;
            $selectNewUserName = null;
            header("Location:../signup.php?error=emailtaken&uid=$username");
            exit();
        } else if($selectNewUserName->rowCount() > 0){
            echo "ten trung: ".$selectNewUserName->rowCount();
            $selectNewUserEmail = null;
            $selectNewUserName = null;
            header("Location:../signup.php?error=uidtaken&mail=$email");
            exit();
        }
        else{
        
        //insert into database, hash password and generate token
        $token = bin2hex(random_bytes(16));
        $hashedPwd =password_hash($password,PASSWORD_DEFAULT);       
        $insert = $watestdb->prepare("insert into users (userName, userEmail, userPwd, token) values (:name, :email, :pwd, :token)");
        $insert->bindValue(":name", $username); 
        $insert->bindValue(":email", $email);
        $insert->bindValue(":pwd", $hashedPwd);
        $insert->bindValue(":token", $token);
         
        //send confirmation email
        include_once('PHPMailer/PHPMailer.php');
        include_once('PHPMailer/SMTP.php');
        include_once('PHPMailer/Exception.php');

        $mail = new PHPMailer;

        $mail->SMTPDebug = 3;                               
        $mail->isSMTP();                                     
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "agileloginsystem@gmail.com";
        $mail->Password = "Trung123";                          
        $mail->SMTPSecure = "tls";                           
        $mail->Port = 587;

        $mail->From = "agileloginsystem@gmail.com";
        $mail->FromName = "loginSystem Admin";

        $mail->smtpConnect(
             array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
    

        $mail->addAddress($email, $username);


        $mail->Subject = "Please verify your email!";
        $mail->WordWrap = 50;  
        $mail->isHTML(true);
        $mail->Body = "Please click on the link below to verify your account <br> <a href='http://localhost:8080/loginSystem/includes/emailconfirm.inc.php?mail=$email&token=$token'
            >http://localhost:8080/loginSystem/includes/emailconfirm.inc.php?mail=$email&token=$token<a/>";
        $mail->isHTML(true);   
        if ($mail->send()){
            $insert->execute();   
            header("Location:../signup.php?error=needverifying");
            
        }
        else{
            header("Location:../signup.php?error=emailnotsent");
        }
        $insert = closeCursor();
        $insert = NULL;
        $watestdc = NULL;
        }
   
    }  
}
else {
    header("Location:../signup.php?");
}
?>
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


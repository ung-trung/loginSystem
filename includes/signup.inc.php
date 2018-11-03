<?php
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
        header("Location:../signup.php?error=invalidmail&uid");
        exit();
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        header("Location:../signup.php?error=invalidmail&uid=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location:../signup.php?error=invalidmail&uid=".$email);
        exit();
    }
    else if ($password !== $passwordRepeat) {
        header("Location:../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    }
//check user already in the databse
//    else {
//        $sql = $watestdb->query("SELECT userID FROM users WHILE userID=?");
//    }
    else { 
        $hashedPwd =password_hash($password,PASSWORD_DEFAULT);
//        $watestdb = new PDO($serverName, $dBUsername, $DBPassword);
        
        $insert = $watestdb->prepare("insert into users (userName, userEmail, userPwd) values (:name, :email, :pwd)");
        $insert->bindValue(":name", $username); 
        $insert->bindValue(":email", $email);
        $insert->bindValue(":pwd", $hashedPwd);
        header("Location:../signup.php?signup=success");
        $insert->execute();
        $insert = NULL;
        $watestdc = NULL;
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

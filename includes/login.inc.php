<?php
if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php';
    
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    
    if((empty($mailuid)) || empty($password)) {
        header("Location:../index.php?error=emptyfields?");
        exit();
    }
    else {      
        $result = $watestdb->prepare("SELECT * FROM users WHERE userName =:name OR userEmail =:email;");
        $result->bindValue(":name", $mailuid);
        $result->bindValue(":email", $mailuid);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $pwdCheck = password_verify($password, $row['userPwd']);
            if($pwdCheck == false){
                header("Location:../index.php?error=wrongpwd?");
                exit();
            }
            else if($pwdCheck == true){
                session_start();
                $_SESSION['userID'] =$row['userID'];
                $_SESSION['userName'] =$row['userName'];
                header("Location:../index.php?login=success");
                exit();
            }
            else {
                header("Location:../index.php?error=wrongpwd?");
                exit();
            }
        }
        
        else {
            header("Location:../index.php?error=nouser?");
            exit();
        }
    }
}
else {
    header("Location:../index.php?");
}
?>
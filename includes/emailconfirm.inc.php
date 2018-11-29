<?php
if (!isset($_GET['mail']) || !isset($_GET ['token'])){
    header("Location:../signup.php?");
    exit();
} else {
    require 'dbh.inc.php';

    $email = $_GET['mail'];
    $token = $_GET['token'];

    $sql = $watestdb->query("SELECT * FROM users WHERE userEmail = '".$email."' AND token = '".$token."' AND isEmailConfirmed = 0");
    if ($sql->rowCount() > 0) {
        $sql1 = $watestdb->prepare("UPDATE users SET isEmailConfirmed = :isEmailConfirmed, token = :token WHERE userEmail = :email");
        $sql1->bindValue(":email", $email);
        $one = 1;
        $sql1->bindValue(":isEmailConfirmed", $one);
        $sql1->bindValue(":token", "");
        $sql1->execute();
        header("Location:../index.php?signup=verified");
        $sql = null;
        $sql1 = null;
        $watestdb = null;
        exit();
    }
    else{
        header("Location:../signup.php?error=noemailoremailhasbeenverified");
        $sql = null;
        $watestdb = null;
        exit();
    }
}
?>
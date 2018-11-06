<?php
    require 'dbh.inc.php';
    $email = $_GET['mail'];
    $token = $_GET['token'];

    $sql1 = $watestdb->prepare("UPDATE users SET isEmailConfirmed = :isEmailConfirmed, token = :token WHERE userEmail = :email");
    $sql1->bindValue(":email", $email);
    $one = 1;
    $sql1->bindValue(":isEmailConfirmed", $one);
    $sql1->bindValue(":token", "");
    $sql1->execute();
    echo $sql1->rowCount() . 'success123';

?>
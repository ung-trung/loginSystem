<?php
session_start();


require 'dbh.inc.php';
$selection = $watestdb->prepare("SELECT * FROM `users`, `highscores` WHERE `userid` = `user` AND `userid` = :userid;");
$selection->bindValue(":userid",$_SESSION['userid']);
$selection->execute();

$row = $selection->fetch(PDO::FETCH_ASSOC);

$name = $row["username"];
$score = $row["score"];
$email = $row["userEmail"];

?>
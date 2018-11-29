<?php
session_start();

require 'dbh.inc.php';

// $deletion = $watestdb->prepare("DELETE FROM highscores WHERE user = :userID AND score < :myScore");
// $deletion->bindValue(":userID", $_SESSION["userid"]);
// $deletion->bindValue(":myScore", $_POST["score"]);
// $deletion->execute();
// $deletion = NULL;

// $insert = $watestdb->prepare("INSERT INTO highscores (user, score) VALUES (:userID, :score)");
// $insert->bindValue(":userID", $_SESSION["userid"]);
// $insert->bindValue(":score", $_POST["score"]);
// $insert->execute();
// $insert = NULL;
$selection = $watestdb->prepare("SELECT * FROM highscores WHERE user = :userID;");
$selection->bindValue(":userID", $_SESSION["userid"]);
$selection->execute();

if ($selection->rowCount() > 0)
{
    $update = $watestdb->prepare("UPDATE highscores SET score = :myScore WHERE user = :userID AND score < :myScore");
    $update->bindValue(":myScore", $_POST["score"]);
    $update->bindValue(":userID", $_SESSION["userid"]);
    $update->execute();
    $update = NULL;
}
else 
{
    $insert = $watestdb->prepare("INSERT INTO highscores (user, score) VALUES (:userID, :score)");
    $insert->bindValue(":userID", $_SESSION["userid"]);
    $insert->bindValue(":score", $_POST["score"]);
    $insert->execute();
    $insert = NULL;
}
$selection = NULL;
print "abc";
?>
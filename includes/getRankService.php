<?php
session_start();
require 'dbh.inc.php';

$selection = $watestdb->prepare("SELECT userName, score FROM highscores, users WHERE users.userid = highscores.user ORDER BY score DESC;");
$selection->execute();
$result = array();

for ( $i = 0; $i < $selection->rowCount(); $i++)
{
    $row = $selection->fetch();
    array_push($result, $row["userName"], $row["score"]);
}
print json_encode($result);
?>
<?php
session_start();
if (!isset($_SESSION["hassession"]))
{
    print "Invalid session, you have no business here";
}
else
{
    require 'dbh.inc.php';

    $selection = $watestdb->prepare("SELECT userName, score FROM highscores, users WHERE users.userid = highscores.user;");
    $selection->execute();
    $result = new someClass();

    for ( $i = 0; $i < $selection->rowCount(); $i++)
    {
        $row = $selection->fetch();
        $result->$row["userName"] = $row["score"];
    }
    print json_encode($result);
}
?>
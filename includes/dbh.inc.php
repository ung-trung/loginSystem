<?php
$serverName = 'mysql:host=127.0.0.1;dbname=WATest';
$dBUsername = 'WATestUser1';
$DBPassword = 'WATestPdw1';

try {
    $watestdb = new PDO('mysql:host=127.0.0.1;dbname=WATest', 'WATestUser1', 'WATestPwd1');
    $watestdb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>


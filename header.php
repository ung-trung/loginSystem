<?php
    session_start();
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="This is an example of a meta description. This will often show up in search results">
        <meta name=vietport content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <a href="#">
                    
                </a>
            </nav>
            <ul>
                <li><a href="index.php"> Home</a></li>
                <li><a href="#"> Portfoilo</a></li>
                <li><a href="#"> About me</a></li>
                <li><a href="#"> Contact</a></li>
            </ul>
            <div>
                <?php
                    if (isset($_SESSION['userName'])){
                        echo '<form action="includes/logout.inc.php" method="POST">                
                    <button type="submit" name="logout-submit">Logout</button>
                </form>';
                    }
                    else {
                        echo '<form action="includes/login.inc.php" method="POST">
                    <input type="text" name="mailuid" placeholder="Username/Email...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="login-submit">Login</button>
                </form>
                <a href="signup.php">Sign up</a>';
                    }
                 ?>
                
                
            </div>
        </header>

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
        <title>Snake Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <!-- JS Scripts/Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- JS script/jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <link rel="stylesheet" href="CSS/snakeGameCss.css" type="text/css">
    </head>
    <body>
        <!-- <header>
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
                <a href="signup.php">Sign up</a>
                <a href="forgotPwd.php">Forgot your password?</a>    
                ';
                    }
                 ?>
                
                
            </div>
        </header> -->
<?php
    function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

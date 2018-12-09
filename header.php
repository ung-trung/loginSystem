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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <!-- JS Scripts/Bootstrap -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <!-- JS script/jQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Cardo" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Concert+One" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <link rel="stylesheet" type="text/css" href="CSS/snakeGameCss.css">
        <link rel="stylesheet" type="text/css" href="CSS/highScore.css">
    </head>
    <body class="backgroundImg">
        <?php
            if (isset($_SESSION['userName'])){
                echo   '<img class="snakeLogo" src="Images/logo_snake4.png">
                        <div class="row navBarStructure">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-1"></div>
                        <div class="col-xl-2 mainNavBar highscore d-flex justify-content-center align-items-center">
                            <img style="width: 40px; height: 40px; margin-right: 5px; margin-bottom: 5px;" src="Images/crown.png">
                            <a href="highScore.php" name="highscore">HIGHSCORE</a>       
                        </div>
                        <div class="col-xl-2 mainNavBar play d-flex justify-content-center align-items-center">
                            <button class="playButton" type="button"><a href="index.php">PLAY</a></button>     
                        </div>
                        <div class="col-xl-2 mainNavBar row logout">
                            <div class="col-xl-9 profile d-flex justify-content-center align-items-center">
                                <a href="profilePage.php">PROFILE</a>
                                <div class="devider"></div>
                            </div>
                            <div class="col-xl-3 logoutButton d-flex justify-content-end align-items-center">
                                <a href="includes/logout.inc.php"><img src="Images/logout.png"></a>
                            </div>
                        </div>
                        <div class="col-xl-1"></div>
                        <div class="col-xl-2"></div>
    </div>';
            }
            else {
            }
        ?>
<?php
    function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>

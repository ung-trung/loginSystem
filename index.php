<?php
require "header.php";
?>
    <main>
        <?php
        if (isset($_SESSION['userName'])){
            if (isset($_GET['login'])) {
                if ($_GET['login'] == "success") {
                    echo '<p>You have been logged in!</p>';
                }
            }
        }
        else {
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "needverifying") {
                    echo '<p class = "signuperror">Your email has not been verified!</p>';
                } else if ($_GET['error'] == "wronguidorpwd") {
                    echo '<p class = "signuperror">Invalid Username or Email!</p>';
                } 
            } else if (isset($_GET['signup'])){
                if ($_GET['signup'] == "verified"){
                    echo '<p>Your email has been verified<br>Login to use our services</p>';
                }
            } else if (isset($_GET['reset'])) {
                if ($_GET['reset'] == "success") {
                    echo '<p>Your password has been reset<br>Please login with your new password!</p>';
                } else if ($_GET['reset'] == "emailsent") {
                    echo '<p>An email including instruction on how to receive your password back has been sent<br>Please check your email inbox for further information!</p>';
                }
            }          
        }   
        ?>
    </main>
<?php
require "footer.php";
?>

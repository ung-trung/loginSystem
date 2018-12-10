<?php
    require "header.php";
?>
    <main>
        <?php
        if (isset($_SESSION['userName'])){
            readfile("snakeGame.html");
            require "footer.php";
        }
        else {
            echo '<div class="container-fluid login-container-fluid">
                <div class="form-div">
                    <h1 class="form-heading text-center">
                    Login
                    </h1>
                    <form action="includes/login.inc.php" method="POST" class="login-form text-center">
                    <div class="user-div">
                        <input type="text" name="mailuid" placeholder="Username" class="form-control">
                    </div>
                    <div class="password-div">
                        <input type="password" name="pwd" placeholder="Password..." class="form-control">
                    </div>

                    <div class="link-div">
                        <a href="signup.php" style="border-right: solid black 1px; padding-right: 7px;">Sign up</a>
                        <a href="forgotPwd.php">Forgot your password?</a> 
                    </div>

                    <button type="submit" name="login-submit" class="btn btn-default btn-info submit-button">Login</button>';

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
                    echo '<p>If your email exists in our database, an email including instruction on how to receive your password back will be sent your mailbox<br>Please check your email inbox for further information!</p>';
                }
            }          
        }   

        echo '      </form>
                </div>
            </div>';
        ?>
    </main>

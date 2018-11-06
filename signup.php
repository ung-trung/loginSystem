<?php
require "header.php";
?>
    <main>
        <div>
            <section>
                <h1>Sign up</h1>
                 <?php
                //display signup error
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        echo '<p class = "signuperror">Fill in all fields!</p>';
                    } else if ($_GET['error'] == "invalidmailuid") {
                        echo '<p class = "signuperror">Invalid Username and Email!</p>';
                    } else if ($_GET['error'] == "invalidmail") {
                        echo '<p class = "signuperror">Invalid Email!</p>';
                    } else if ($_GET['error'] == "invaliduid") {
                        echo '<p class = "signuperror">Invalid Username!</p>';
                    } else if ($_GET['error'] == "passwordcheck") {
                        echo '<p class = "signuperror">Check the password again!</p>';
                    } else if ($_GET['error'] == "passwordcheck") {
                        echo '<p class = "signuperror">Check the password again!</p>';
                    } else if ($_GET['error'] == "usernameemailtaken") {
                        echo '<p class = "signuperror">Username and Email have already been taken!</p>';
                    } else if ($_GET['error'] == "emailtaken") {
                        echo '<p class = "signuperror">Email has already been taken!</p>';
                    } else if ($_GET['error'] == "uidtaken") {
                        echo '<p class = "signuperror">Username has already been taken!</p>';
                    } else if ($_GET['error'] == "needverifying") {
                        echo '<p class = "signuperror">Please verify your email!</p>';
                    } else if ($_GET['error'] == "emailnotsent") {
                        echo '<p class = "signuperror">Your email has not been sent, try again later!</p>';
                    } 
                } 
                else if (isset($_GET['signup'])) { 
                    if ($_GET['signup'] == "success") {
                        echo '<p>Signup successful!</p>';
                    }
                }
                ?>
                <form action="includes/signup.inc.php" method="POST">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="text" name="mail" placeholder="E-mail">              
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-repeat" placeholder="Repeat password">
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
            </section>
        </div>
    </main>
<?php
require "footer.php";
?>

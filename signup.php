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
                        echo '<p>Invalid Username and Email!</p>';
                    } else if ($_GET['error'] == "invalidmail") {
                        echo '<p>Invalid Email!</p>';
                    } else if ($_GET['error'] == "invaliduid") {
                        echo '<p>Invalid Username!</p>';
                    } else if ($_GET['error'] == "passwordcheck") {
                        echo '<p>Check the password again!</p>';
                    } else if ($_GET['error'] == "passwordcheck") {
                        echo '<p>Check the password again!</p>';
                    } else if ($_GET['error'] == "usernameemailtaken") {
                        echo '<p>Username and Email have already been taken!</p>';
                    } else if ($_GET['error'] == "emailtaken") {
                        echo '<p>Email has already been taken!</p>';
                    } else if ($_GET['error'] == "uidtaken") {
                        echo '<p>Username has already been taken!</p>';
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

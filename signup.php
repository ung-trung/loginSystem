<?php
require "header.php";
?>
    <main>
        <div>
            <section>
                
                 <!-- <?php
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
                        echo '<p class = "signuperror">Username and Email have already been taken! Please select a new username and email!</p>';
                    } else if ($_GET['error'] == "emailtaken") {
                        echo '<p class = "signuperror">Email has already been taken! Please select a new email!</p>';
                    } else if ($_GET['error'] == "uidtaken") {
                        echo '<p class = "signuperror">Username has already been taken! Please select a new username</p>';
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
                ?> -->
                
                <div class="container-fluid login-container-fluid">
                <div class="form-div">
                    <h1 class="form-heading text-center">
                        Signup
                    </h1>
                    <form action="includes/signup.inc.php" method="POST" class="login-form text-center">
                        <div class="user-div">
                            <input type="text" name="uid" placeholder="Username" class="form-control">
                        </div>

                        <div class="user-div">
                            <input type="text" name="mail" placeholder="E-mail" class="form-control">
                        </div>

                        <div class="user-div">
                            <input type="password" name="pwd" placeholder="Password" class="form-control">
                        </div>

                        <div class="user-div">
                            <input type="password" name="pwd-repeat" placeholder="Confirm your password" class="form-control">
                        </div>
                        
                        <button type="submit" name="signup-submit" class="btn btn-default btn-info submit-button">Signup</button>

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
                        echo '<p class = "signuperror">Username and Email have already been taken! Please select a new username and email!</p>';
                    } else if ($_GET['error'] == "emailtaken") {
                        echo '<p class = "signuperror">Email has already been taken! Please select a new email!</p>';
                    } else if ($_GET['error'] == "uidtaken") {
                        echo '<p class = "signuperror">Username has already been taken! Please select a new username</p>';
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
                        
                    </form>
                </div>
            </section>
        </div>
    </main>
<?php
require "footer.php";
?>

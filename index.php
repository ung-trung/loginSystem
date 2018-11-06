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
            } 
        }
        ?>
    </main>
<?php
require "footer.php";
?>

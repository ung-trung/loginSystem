<?php
require "header.php";
?>
<!-- <?php
    if(isset($_GET['error'])){
        if ($_GET['error'] == "emailnotsent") {
            echo '<p class = "signuperror">Your email has not been sent, try again later!</p>';
        } 
    }
?> -->
<main>
    <div class="container-fluid login-container-fluid">
    <div class="form-div">
      <h1 class="form-heading text-center">
        Redeem password
      </h1>
      <form action='includes/forgotPwd.inc.php' method='POST' class="login-form text-center">
        <div class="user-div">
          <input type="text" name="mail" placeholder="Enter your email address" class="form-control">
        </div>
        
        <button type="submit" name="forgotPwd" class="btn btn-default btn-info submit-button">Don't forget next time :D</button>
        <?php
            if(isset($_GET['error'])){
                if ($_GET['error'] == "emailnotsent") {
                    echo '<p class = "signuperror">Your email has not been sent, try again later!</p>';
                } 
            }
        ?>
      </form>
    </div>

</main>
<?php
require "footer.php";
?>
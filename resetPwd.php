 <?php
    require 'header.php';
 ?> 

<?php
    $email = $_GET['mail'];
    $token = $_GET['token'];
    if (isset($_GET['mail']) || isset($_GET['token'])) {
        
        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyfields'){
                echo '<p class = "signuperror">Fill in all fields!</p>';
            } 
            else if ($_GET['error'] == 'passwordcheck') {
                echo '<p class = "signuperror">Check the password again!</p>';
            }            
        } 
        



        echo "
        <div class='container-fluid login-container-fluid'>
            <div class='form-div'>
                <h1 class='form-heading text-center'>
                    Set new password
                </h1>
                <form method='POST' class='login-form text-center'>         
                    
                    <div class='user-div'>
                        <input type='password' name='pwd' placeholder='Password' class='form-control'>
                    </div>

                    <div class='user-div'>
                        <input type='password' name='pwd-repeat' placeholder='Confirm your password' class='form-control'>
                    </div>

                    <button type='submit' name='resetPwd' class='btn btn-default btn-info submit-button'>Reset Password</button>
                </form>
            </div>
        </div>";



        if (isset($_POST['resetPwd'])){
            $password = $_POST['pwd'];
            $passwordRepeat = $_POST['pwd-repeat'];

            if (empty($password) || empty($passwordRepeat)) {
                header("Location:resetPwd.php?error=emptyfields&mail=$email&token=$token");
                exit();
            } else if ($password !== $passwordRepeat) {
                header("Location:resetPwd.php?error=passwordcheck&mail=$email&token=$token");
                exit();
            } else {
                require 'includes/dbh.inc.php';
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql = $watestdb->query("SELECT * FROM users WHERE userEmail =" . $watestdb->quote($email) . "  AND token=" . $watestdb->quote($token));
                if ($sql->rowCount() > 0) {
                    $sql1 = $watestdb->query("UPDATE users SET token= '', userPwd=".$watestdb->quote($hashedPwd)." WHERE userEmail=" . $watestdb->quote($email));
                    header("Location:index.php?reset=success");
                    $sql = null;
                    $sql1 = null;
                    $watestdb = null;
                    exit();
                }
            }
        }
    } 
    else {
        header("Location:index.php");
        exit();
    }
?>

<?php
require 'footer.php';
?>   

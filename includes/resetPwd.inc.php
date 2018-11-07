 <?php
    require '../header.php'
 ?>      
<?php
    if (isset($_GET['mail']) || isset($_GET['token'])) {
        
        if(isset($_GET['error'])){
            if($_GET['error'] == 'emptyfields'){
                echo '<p class = "signuperror">Fill in all fields!</p>';
            } 
            else if ($_GET['error'] == 'passwordcheck') {
                echo '<p class = "signuperror">Check the password again!</p>';
            }            
        } 
        

        $email = $_GET['mail'];
        $token = $_GET['token'];

        echo "<h1>Reset your password</h1>    
        <form method='POST'>
            <input type='password' name='pwd' placeholder='Enter new your password'>
            <input type='password' name='pwd-repeat' placeholder='confirm your new password'>               
            <button type='submit' name='resetPwd'>Reset your password</button>
        </form>";
        if (isset($_POST['resetPwd'])){
            $password = $_POST['pwd'];
            $passwordRepeat = $_POST['pwd-repeat'];

            if (empty($password) || empty($passwordRepeat)) {
                header("Location:../includes/resetPwd.inc.php?error=emptyfields&mail=$email&token=$token");
                exit();
            } else if ($password !== $passwordRepeat) {
                header("Location:../includes/resetPwd.inc.php?error=passwordcheck&mail=$email&token=$token");
                exit();
            } else {
                require 'dbh.inc.php';
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql = $watestdb->query("SELECT * FROM users WHERE userEmail =" . $watestdb->quote($email) . "  AND token=" . $watestdb->quote($token));
                if ($sql->rowCount() > 0) {
                    $sql1 = $watestdb->query("UPDATE users SET token= '', userPwd=".$watestdb->quote($hashedPwd)." WHERE userEmail=" . $watestdb->quote($email));
                    header("Location:../index.php?reset=success");
                    $sql = null;
                    $sql1 = null;
                    $watestdb = null;
                    exit();
                }
            }
        }
    } 
    else {
        header("Location:../index.php");
        exit();
    }
?>

<?php
require '../footer.php'
?>   

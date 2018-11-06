<?php
if (!isset($_GET['mail']) || !isset($_GET ['token'])){
    header("Location:../signup.php?");
    exit();
} else {
    require 'dbh.inc.php';

    $email = $_GET['mail'];
    $token = $_GET['token'];
    
    echo "<br>email: ".$email."<br>";
    echo "token: ".$token."<br>";

    //$sql = $watestdb->prepare("SELECT * FROM users WHERE userEmail = :email AND token = :token AND isEmailConfirmed = :isEmailConfirm");
    $sql = $watestdb->query("SELECT * FROM users WHERE userEmail = '".$email."' AND token = '".$token."' AND isEmailConfirmed = 0");
    // $sql->bindValue(":email", $email);
    // $sql->bindValue(":token", $token);
    // $sql->bindValue(":isEmailConfirm", "0");
    // $sql->execute();
    // $row = $sql->fetchAll();

    
    // foreach ($abc as $row){
    //     echo $
    // }

    $selectNewUserEmail = $watestdb->prepare("SELECT userEmail FROM users WHERE userEmail = :email");
    $selectNewUserEmail->bindValue(":email", $email);
    $selectNewUserEmail->execute();

    //echo $sql();
    echo "row count: ".$sql->rowCount()."<br>";
    echo "y chang row count: ".$selectNewUserEmail->rowCount()."<br>";

    $result = $sql->fetch();
    for ($i= 0; $i< $sql->rowCount(); $i++){
        $result = $sql->fetch();
        echo $result['userName'];       
    }
     
   

    if ($sql->rowCount() > 0) {
            $sql1 = $watestdb->prepare("UPDATE users SET isEmailConfirmed = :isEmailConfirmed, token = :token WHERE userEmail = :email");
            $sql1->bindValue(":email", $email);
            $one = 1;
            $sql1->bindValue(":isEmailConfirmed", $one);
            $sql1->bindValue(":token", "");
            $sql1->execute();
            echo $sql1->rowCount() .'success123';
    
        
        echo 'success';
        //header("Location:../signup.php?signup=verified");

        exit();
    }
    else{
        echo 'failed';
        //header("Location:../signup.php?error=noemailoremailhasbeenverified");
        exit();
    }
}
?>
<?php
    require "header.php";
?>

<?php
    require 'includes/dbh.inc.php';
    $selection = $watestdb->prepare("SELECT * FROM `users`, `highscores` WHERE `userid` = `user` AND `userid` = :userid;");
    $selection->bindValue(":userid",$_SESSION['userid']);
    $selection->execute();

    $row = $selection->fetch(PDO::FETCH_ASSOC);

    $name = $row["userName"];
    $score = $row["score"];
    $email = $row["userEmail"];  

    if($name != null && $score != null && $email != null) {
  
    }
    else {
        $name = "Please play a game to update your profile";
        $score = "";
        $email = "";
    }
    
    
    $rankImage ="";
    if($score != null){
        if ($score<=10){
            $rankImage = "https://cdn.leagueofgraphs.com/img/league-icons/160/1-1.png";
        } 
        else if ($score<=50){
            $rankImage ="https://cdn.leagueofgraphs.com/img/league-icons/160/2-1.png";  
        }
        else if ($score<=100){
            $rankImage = "https://cdn.leagueofgraphs.com/img/league-icons/160/3-1.png";
        } else {
            $rankImage = "https://cdn.leagueofgraphs.com/img/league-icons/160/5-1.png";
        }
    }


     if (isset($_SESSION['userName'])){
            echo '<body class="backgroundImg">

    <div class="main d-flex justify-content-center align-items-center">
            <div class="form-div" style="margin:300px">
                <h1 class="form-heading text-center">
                Your Profile
                </h1>
                <div class="login-form text-center">
                    <h4 class="profileProperty">Name</h4>
                    <div id="username" class="user-div">
                        '.$name.'
                    </div>
                    <h4 class="profileProperty">Highscore</h4>
                    <div id="highscore" class="user-div">
                        '.$score.'
                    </div> 
                    <h4 class="profileProperty">Current Rank</h4>
                    <div id="currentRank" class="user-div">
                        <img src="'.$rankImage.'">
                    </div>
                    <h4 class="profileProperty">Contact</h4>
                    <div id="email" class="user-div">
                        '.$email.'
                    </div>  
                </div>
            </div>
    </div>
</body>';
    }
    else{
        echo "naughty naughty...";
    }
?>


<?php
    require "footer.php";
?>
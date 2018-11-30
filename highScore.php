<?php
    require "header.php";
?> 
    <!-- Navigation Bar -->
    <div class="row navBarStructure">
        <div class="col-xl-2"></div>
        <div class="col-xl-1"></div>
        <div class="col-xl-2 mainNavBar highscore d-flex justify-content-center align-items-center">
            <img style="width: 40px; height: 40px; margin-right: 5px; margin-bottom: 5px;" src="Images/crown.png">
            <a href="highScore.php">HIGHSCORE</a>       
        </div>
        <div class="col-xl-2 mainNavBar play d-flex justify-content-center align-items-center">
            <button class="playButton" type="button">PLAY</button>
        </div>
        <div class="col-xl-2 mainNavBar row logout">
            <div class="col-xl-9 profile d-flex justify-content-center align-items-center">
                <a href="">PROFILE</a>
                <div class="devider"></div>
            </div>
            <div class="col-xl-3 logoutButton d-flex justify-content-end align-items-center">
                <img src="Images/logout.png">
            </div>
        </div>
        <div class="col-xl-1"></div>
        <div class="col-xl-2"></div>
    </div> 

    <!-- Leaderboard Table -->
    <div class="leaderBoard">
        <div class="board">
            <h1>HIGHSCORE</h1>
            <img src="Images/cup.png">
            <div class="grid-container">
                <div class="grid-item item-1">
                    <img class="medal" src="Images/gold-medal.png">
                    <!-- <div class="name">Nguyen Tran</div>
                    <div class="score"> 200</div> -->
                </div>
                <div class="grid-item item-2">
                    <img class="medal" src="Images/second.png">
                    <!-- <div class="name">Huy Luong</div>
                    <div class="score"> 150</div> -->
                </div>
                <div class="grid-item item-3">
                    <img class="medal" src="Images/third.png">
                    <!-- <div class="name">Trung Ung</div>
                    <div class="score"> 100</div> -->
                </div>
                <div class="grid-item item-4"></div>
                <div class="grid-item item-5"></div>
                <div class="grid-item item-6"></div>
                <div class="grid-item item-7"></div>
                <div class="grid-item item-8"></div>
                <div class="grid-item item-9"></div>
                <div class="grid-item item-10"></div>
            </div>
        </div>
    </div>

    <script src="JavaScript/highScore.js" type="text/javascript"></script>
<?php
    require "footer.php";
?>
window.onload=function() {
    canv=document.getElementById("snakeGame");
    context=canv.getContext("2d");
    //Add keyPush event listener:
    document.addEventListener("keydown", keyPush);
    // Set the framerate:
    gameInterval = setInterval(snakeGame, 1000/10);
}
//x and y velocity:
xv = yv = 0;
//x and y position:
xp = yp = 10;
//Grid size and tile count:
gs = 35;
tc = 20;
// Random x and y position of first apple:
xa = ya = 10;
while (xa == xp && ya == yp)
{
    xa = Math.floor(Math.random()*tc);
    ya = Math.floor(Math.random()*tc);
}
//Trail and tail:
tail = 3;
// document.getElementById("gameScore").innerHTML = tail - 3;
$(".gameScore").text(tail -3);
function Snake(x, y) {
    this.x = x;
    this.y = y;
}
trail = [];

function snakeGame() {
    //Add velocity:
    xp += xv;
    yp += yv;
    //Hit borders cases:
    if (xp < 0)
    {
        xp = tc -1;
    }
    if (xp > tc -1)
    {
        xp = 0;
    }
    if (yp < 0)
    {
        yp = tc -1;
    }
    if (yp > tc -1)
    {
        yp = 0;
    }
    //Speed up:
    if (trail.length >= 30)
    {
        clearInterval(gameInterval);
        gameInterval = setInterval(snakeGame, 1000/15);
    }
    if (trail.length >= 50)
    {
        clearInterval(gameInterval);
        gameInterval = setInterval(snakeGame, 1000/20);
    }
    if (trail.length >= 75)
    {
        clearInterval(gameInterval);
        gameInterval = setInterval(snakeGame, 1000/25);
    }
    if (trail.length >= 100)
    {
        clearInterval(gameInterval);
        gameInterval = setInterval(snakeGame, 1000/30);
    }
    if (trail.length >= 200)
    {
        clearInterval(gameInterval);
        gameInterval = setInterval(snakeGame, 1000/35);
    }
    if (trail.length >= 350)
    {
        clearInterval(gameInterval);
        gameInterval = setInterval(snakeGame, 1000/40);
    }
    
    
    //Fill all "other" tiles black:
    // context.fillStyle="black";
    // context.fillRect(0, 0, canv.width, canv.height);

    //Testing game background color:
    for (let i = 0; i < 20; i++)
    {
        for (let k = 0; k < 20; k++)
        {
            if (i % 2 != 0 && k % 2 == 0)
            {
                context.fillStyle="#baf477";
            }
            else if (i % 2 == 0 && k % 2 == 0)
            {
                context.fillStyle="#96ce58";
            }
            else if (i % 2 != 0 && k % 2 != 0)
            {
                context.fillStyle="#96ce58";
            }
            else
            {
                context.fillStyle="#baf477";
            }
            context.fillRect(0 + i*gs, 0 + k*gs, gs, gs);
        }
    }
    
    //Fill apple tiles red:
    context.fillStyle="#b70b0b";
    context.fillRect(xa*gs, ya*gs, gs, gs);

    //Fill snake tiles yellow:
    for (let i = trail.length - 1; i >= 0; i--)
    {
        context.fillStyle="#9e7400";    
        let a = 0;
        context.fillRect(trail[i].x*gs, trail[i].y*gs, gs, gs);
        //If x and y position "touch" any trail tile:
        if (trail[i].x == xp && trail[i].y == yp && (xv != 0 || yv != 0))
        {
            gameOver();
        }
    }
    //When snake eat apple:
    if (xa == xp && ya == yp)
    {
        //Show the score:
        tail++;
        // document.getElementById("gameScore").innerHTML = tail - 3;
        $(".gameScore").text(tail -3);
        //Random new apple location:
        xa = Math.floor(Math.random()*tc);
        ya = Math.floor(Math.random()*tc);
        let condition = true;

        while (condition) 
        {
            let condition2 = true;
            for (x of trail)
            {
                if (x.x == xa && x.y == ya)
                {
                    // console.log("apple: " + xa + " " + ya);
                    // console.log("fail");
                    condition2 = false;
                }
            }
            if (condition2)
            {
                condition = false;
            }
            else
            {
                xa = Math.floor(Math.random()*tc);
                ya = Math.floor(Math.random()*tc);
            }
        }
        // console.log(trail);
    }
    //Add the last positions to the trail:
    trail.push(new Snake(xp, yp));
    while(trail.length>tail)
    {
        trail.shift();
    }

}
//KeyPush event
function keyPush(event) {
    switch(event.keyCode) {
        //Left button:
        case 37, 65:
            if (xv != 1)
            {
                xv = -1; yv = 0;
            }
            break;
        //Up button:
        case 38, 87:
            if (yv != 1)
            {
                xv = 0; yv = -1;
            }
            break;
        //Right button:
        case 39, 68:
            if (xv != -1)
            {
                xv = 1; yv = 0;
            }
            break;
        //Down button:
        case 40, 83:
            if (yv != -1)
            {
                xv = 0; yv = 1;
            }
            break;
    }
}
function gameOver() {
    document.removeEventListener("keydown", keyPush);
    xv = yv = 0;
    clearInterval(gameInterval);

    $(".popupWindow").show(1000);


    //Update database:
    $.post("includes/setHighScoreService.php", {score: tail - 3});

    //Fetch leaderboard:
    $.post("includes/getLeaderboardService.php", function (data, status, jqXHR) 
    { 
        jqXHR.done(function(data) { 
            data = data.substring(4, data.length - 2);
            data = data.replace(/['"]+/g, '');
            data = data.split(",");
            console.log(data);

            $(".leaders").append($("<img src='Images/gold-medal.png'><br>"));
            $(".leaders").append($("<h3></h3>").text(data[0]));
            $(".leaders").append($("<h4></h4>").text(data[1]));
            $(".leaders").append("<img src='Images/second.png'><br>");
            $(".leaders").append($("<h3></h3>").text(data[2]));
            $(".leaders").append($("<h4></h4>").text(data[3]));
            $(".leaders").append("<img src='Images/third.png'><br>");
            $(".leaders").append($("<h3></h3>").text(data[4]));
            $(".leaders").append($("<h4></h4>").text(data[5]));
        })

    })
}

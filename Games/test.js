window.onload=function() {
    canv=document.getElementById("gameSpace");
    context=canv.getContext("2d");
    //Add keyPush event listener:
    document.addEventListener("keydown", keyPush);
    // Set the framerate:
    gameInterval = setInterval(snakeGame, 1000/15);
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
document.getElementById("gameScore").innerHTML = tail;
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
    
    //Fill all "other" tiles black:
    context.fillStyle="black";
    context.fillRect(0, 0, canv.width, canv.height);
    //Fill apple tiles red:
    context.fillStyle="red";
    context.fillRect(xa*gs, ya*gs, gs - 2, gs - 2);
    //Fill snake tiles yellow:
    context.fillStyle="lime";
    for (let i = 0; i < trail.length; i++)
    {
        let a = 0;
        context.fillRect(trail[i].x*gs, trail[i].y*gs, gs, gs);
        //If x and y position "touch" any trail tile:
        if (trail[i].x == xp && trail[i].y == yp && (xv != 0 || yv != 0))
        {
            gameOver();

        }
    }
    //If x and y eat apple:
    if (xa == xp && ya == yp)
    {
        //Show the score:
        tail++;
        document.getElementById("gameScore").innerHTML = tail;

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
                    console.log("apple: " + xa + " " + ya);
                    console.log("fail");
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
        console.log(trail);
    }
    //Add the last positions to the trail:
    trail.push(new Snake(xp, yp));
    while(trail.length>tail)
    {
        trail.shift();
    }
}
function keyPush(event) {
    switch(event.keyCode) {
        //Left button:
        case 37:
            xv = -1; yv = 0;
            break;
        //Up button:
        case 38:
            xv = 0; yv = -1;
            break;
        //Right button:
        case 39:
            xv = 1; yv = 0;
            break;
        //Down button:
        case 40:
            xv = 0; yv = 1;
            break;
    }
}
function gameOver() {
    document.removeEventListener("keydown", keyPush);
    xv = yv = 0;
    clearInterval(gameInterval);
}
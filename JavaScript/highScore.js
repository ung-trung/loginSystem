console.log("abc");
$(".leaderBoard").ready(function() {
 
    $.post("includes/getLeaderboardService.php", function (data, status, jqXHR) {
        jqXHR.done(function(data) {
            data = data.substring(4, data.length - 2);
            data = data.replace(/['"]+/g, '');
            data = data.split(",");
            console.log(data);

            // $(".item-1").append($("<img src='Images/gold-medal.png'><br>"));
            // $(".item-1").append($("<div class='name'></div>").text(data[0]));
            // $(".item-1").append($("<div class='score'></div>").text(data[1]));

            // $(".item-1").append($("<img src='Images/gold-medal.png'><br>"));
            // $(".item-1").append($("<div class='name'></div>").text(data[0]));
            // $(".item-1").append($("<div class='score'></div>").text(data[1]));

            // $(".item-1").append($("<img src='Images/gold-medal.png'><br>"));
            // $(".item-1").append($("<div class='name'></div>").text(data[0]));
            // $(".item-1").append($("<div class='score'></div>").text(data[1]));
            let k = 1;
            for (let i = 0; k <= 10; i = i + 2)
            {
                if (i < 6)
                {
                    $(".item-" + k).append($("<div class='name'></div>").text(data[i]));
                    $(".item-" + k).append($("<div class='score'></div>").text(data[i + 1]));
                    k++;
                }
                else
                {
                    $(".item-" + k).append($("<div class='rank'></div>").text(k + "th"));
                    $(".item-" + k).append($("<div class='name'></div>").text(data[i]));
                    $(".item-" + k).append($("<div class='score'></div>").text(data[i + 1]));
                    k++;
                }
            }
        })
    })
});
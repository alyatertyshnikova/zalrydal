<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Music map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .block1{
                width:1357px;
                height:628px;
                margin: auto;
                position:relative;
            }
            .Russia{
                position:absolute;
                left:710px;
                top:145px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body style="background-image:url('images/waves.gif')">
        <div class="block1">
            <img src='images/worldmap.png'>
        </div>
        <div class="Russia">
            <input type="image" id="Russia" src='images/krestik.png' onclick='playMusic(this)'>
        </div>
        <input type="range" id="years" min="1990" max="2010" step="10">
        <form action="logout.php" method="post"> 
            <input type="submit" name="exit" value="Log out">
        </form>
        <script>
                var ext = ".mp3";
                var year = document.getElementById("years");
                var audio;

                function getRandomInt(min, max) {
                    return Math.floor(Math.random() * (max - min + 1)) + min;
                }

                function playMusic(arg) {
                    var country = arg.id;
                    var path = "audio/" + year.value + "/" + country + "/";
                    $.ajax({
                        type: "POST",
                        url: "count_files.php",
                        data: {path: path},
                        success: function (count) {
                            //alert(count);
                            //document.write(count);
                            if (count != 0)
                            {
                                var rand = getRandomInt(1, count);
                                if (audio != null) {
                                    audio.pause();
                                }
                                else{
                                    audio=new Audio();
                                }
                                audio.src = path + rand + ext;
                                audio.play();
                            } else
                            {
                                alert("Sorry, there was no music in this country this year :(");
                            }
                        }
                    });

                }
            </script>
    </body>
</html>

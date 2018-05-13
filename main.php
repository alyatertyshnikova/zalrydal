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
                left:685px;
                top:85px;
            }
            #Russia{
                outline:none;
            }
            .Ukraine{
                position:absolute;
                left:670px;
                top:130px;
            }
            #Ukraine{
                outline:none;
            }
            .Belarus{
                position:absolute;
                left:655px;
                top:110px;
            }
            #Belarus{
                outline:none;
            }
            .Britain{
                position:absolute;
                left:544px;
                top:112px;
            }
            #Britain{
                outline:none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body style="background-image:url('images/waves.jpg')">
        <div class="block1">
            <img src='images/worldmap.png'>
            <div class="Russia">
                <input type="image" id="Russia" name='country' src='images/krestikk.png' onclick='playMusic(this)'>
            </div>
            <div class="Ukraine">
                <input type="image" id="Ukraine" name='country' src='images/krestikk.png' onclick='playMusic(this)'>
            </div>
            <div class="Belarus">
                <input type="image" id="Belarus" name='country' src='images/krestikk.png' onclick='playMusic(this)'>
            </div>
            <div class="Britain">
                <input type="image" id="Britain" name='country' src='images/krestikk.png' onclick='playMusic(this)'>
            </div>
        </div>

        <input type="range" id="years" min="1990" max="2010" step="10" onchange='buttons()'>
        <form action="logout.php" method="post"> 
            <input type="submit" name="exit" value="Log out">
        </form>

        <script>
            var ext = ".mp3";
            var year = document.getElementById("years");
            var audio;

            function check_button(element) {
                var path = "audio/" + year.value + "/" + element.id + "/";
                $.ajax({
                    type: "POST",
                    url: "count_files.php",
                    data: {path: path},
                    success: function (count) {
                        if (count == 0){
                            element.style.visibility = "hidden";
                        } else {
                            element.style.visibility = "visible";
                        }
                    }
                })
            }

            function buttons() {
                var countries = document.getElementsByName("country");
                var countries_array = Array.prototype.slice.call(countries);
                countries_array.forEach(check_button);
                //var max = countries.length;
                //alert(max);

            }
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
                        if (count != 0)
                        {
                            var rand = getRandomInt(1, count);
                            if (audio != null) {
                                audio.pause();
                            }
                            audio = new Audio(path + rand + ext);

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

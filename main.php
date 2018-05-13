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
            .slidecontainer {
                width: 100%;
                height: 150px;
                display: inline-block;
                outline: none;
            }
            .slider {
                -webkit-appearance: none;
                appearance: none;
                width: 100%;
                height: 110px;
                background: url('images/stave4.png');
                outline: none;
            }
            
            datalist{
                -webkit-appearance: none;
                appearance: none;
                color: black;
                display: flex;
               justify-content: space-between; 
               background: url('images/tik.png');
            }
            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 30px;
                height: 100px;
                background: url('images/clef1.png');
                background-size: 30px 100px;
            }   
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
                outline: none;
            }
            .Britain{
                position:absolute;
                left:544px;
                top:112px;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body style="background-image:url('images/waves.jpg')">
        <div class="block1">
            <img src='images/worldmap.png'>
            <div class="Russia">
                <input type="image" id="Russia" name='country' src='images/krestik.png' onclick='playMusic(this)'>
            </div>
            <div class="Britain">
                <input type="image" id="Britain" name='country' src='images/krestik.png' onclick='playMusic(this)'>
            </div>
        </div>
        <div class="slidercontainer">
            <input type="range" min="1990" max="2010" step="10" class="slider" id="years" list="ticks"
                   onchange="buttons()">
            <datalist id="ticks">
                <option>1990</option>
                <option>2000</option>
                <option>2010</option>
            </datalist>
        </div>
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

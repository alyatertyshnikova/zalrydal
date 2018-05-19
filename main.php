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
            @font-face {
                font-family: 'Reckless Sample';
                font-style: normal;
                font-weight: normal;
                src: local('Reckless Sample'), url('reckless_sample.woff') format('woff');
            }
            #container{
                width: 98%;
                height: 90px;
                display: inline-block;
                outline: none;
                position: fixed;
                bottom:0%;
            }
            #player{
                position: fixed;
                top:5px;
                left:0%;
                height: 20px;
                width: 20px;
            }

            #exit{
                position: fixed;
                top:10px;
                right:12px;
            }

            .slider {
                -webkit-appearance: none;
                appearance: none;
                width: 100%;
                height: 60px;
                background: url('images/stave9.png');
                outline: none;
            }

            datalist{
                -webkit-appearance: none;
                appearance: none;
                color: black;
                font-size: 15pt;
                display: flex;
                font-family:'Reckless Sample';
                justify-content: space-between; 
                background: url('images/tik.png');
            }
            .slider::-webkit-slider-thumb {
                -webkit-appearance: none;
                appearance: none;
                width: 30px;
                height: 90px;
                background: url('images/clef.png');
                background-size: 30px 90px;
            }   
            .block1{
                width:1357px;
                height:628px;
                margin: auto;
                position:relative;
            }
            #Russia{
                position:absolute;
                left:685px;
                top:85px;
                outline:none;
                visibility:visible;
            }
            #Ukraine{
                position:absolute;
                left:670px;
                top:125px;
                outline:none;
                visibility:visible;
            }
            #Belarus{
                position:absolute;
                left:655px;
                top:105px;
                outline:none;
                visibility:hidden;
            }
            #Britain{
                position:absolute;
                left:544px;
                top:108px;
                outline:none;
                visibility:visible;
            }
            #Island{
                position:absolute;
                left:500px;
                top:55px;
                outline:none;
                visibility:visible;
            }
            #France{
                position:absolute;
                left:560px;
                top:140px;
                outline:none;
                visibility:visible;
            }
            #Germany{
                position:absolute;
                left:590px;
                top:120px;
                outline:none;
                visibility:visible;
            }
            #Italy{
                position:absolute;
                left:600px;
                top:150px;
                outline:none;
                visibility:hidden;
            }
            #USA{
                position:absolute;
                left:150px;
                top:170px;
                outline:none;
                visibility:visible;
            }
            #Canada{
                position:absolute;
                left:185px;
                top:95px;
                outline:none;
                visibility:hidden;
            }
            #Australia{
                position:absolute;
                left:1085px;
                top:465px;
                outline:none;
                visibility:hidden;
            }
            #NewZeland{
                position:absolute;
                left:1225px;
                top:520px;
                outline:none;
                visibility:visible;
            }
            #SouthKorea{
                position:absolute;
                left:1053px;
                top:177px;
                outline:none;
                visibility:visible;
            }
            #China{
                position:absolute;
                left:950px;
                top:190px;
                outline:none;
                visibility:hidden;
            }
            #Japan{
                position:absolute;
                left:1093px;
                top:175px;
                outline:none;
                visibility:hidden;
            }
            #videoPlayer{
                position: fixed;
                left:10%;
                top:10%;
                visibility: hidden;
            }
            #gramophone{
                outline:none;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body style="background-image:url('images/waves.jpg')">
        <div class="block1">
            <img src='images/worldmap.png'>
            <input type="image" id="Russia" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Ukraine" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Belarus" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Britain" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Island" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="France" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Germany" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Italy" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="USA" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Canada" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Australia" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="NewZeland" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="SouthKorea" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="China" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Japan" name='country' src='images/note.png' onclick='playMusic(this)'>
        </div>
        <div class="slidercontainer" id="container">
            <input type="range" min="1990" max="2010" step="10" class="slider" id="years" list="ticks"
                   onchange="buttons()">
            <datalist id="ticks">
                <option>1990</option>
                <option>2000</option>
                <option>2010</option>
            </datalist>
        </div>
        <div id="videoPlayer">
            <video controls id="video">
                <source src="zalrydal.mp4" type="video/mp4">
            </video>
        </div>
        <div id="player">
            <input type="image" id='gramophone' src='images/gramophone2.png' onclick='playOrPause()'>
        </div>
        <form action="logout.php" method="post"> 
            <input type="image" style="outline:none;" src="images/coda.png" alt="Submit" id="exit">
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
                        if (count == 0) {
                            element.style.visibility = "hidden";
                        } else {
                            element.style.visibility = "visible";
                        }
                    }
                })
            }

            var videoPlayer = document.getElementById("videoPlayer");
            var video=document.getElementById("video");
            function playOrPause() {
                if (audio == null) {
                    if (videoPlayer.style.visibility!=="visible") {
                        videoPlayer.style.visibility = "visible";
                        video.play();
                    }
                    else{
                        video.pause();
                        video.currentTime=0;
                        videoPlayer.style.visibility = "hidden";
                    }
                } else {
                    if (audio.paused) {
                        audio.play();
                    } else {
                        audio.pause();
                    }
                }
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
                    url: "get_music.php",
                    data: {year: year.value, country:country},
                    success: function (result) {
                        if (result !== false)
                        {
                            alert("s");
                            alert(result);
                          // document.write(song);
                            
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
<!--var rand = getRandomInt(1, result.length);
                            if (audio != null) {
                               // audio.pause();
                            }
                            if (!video.paused){
                              //  video.pause();
                            }
                            audio = new Audio();
                            audio.play();-->
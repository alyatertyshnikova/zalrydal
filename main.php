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
    </head>
    <body style="background-image:url('images/waves.gif')">
        <div class="block1">
            <img src='images/worldmap.png'>
            <div class="Russia">
                <input type="image" id="Russia" src='images/krestik.png' onclick='playMusic(this)'>
            </div>
            <input type="range" id="years" min="1990" max="2010" step="10">
            <p id="one"></p>
             
            <script>
                var ext = ".mp3";
                var year = document.getElementById("years");
                var audio;
                function playMusic(arg) {
                    var country = arg.id;
                    var path = "audio/" + country + "/";
                    var size = "<?php $dir=$_REQUEST['path'];
                    echo $dir;?>";
                    document.write(size);
                    if (audio != null) {
                        audio.pause();
                    }
                    audio = document.getElementById(year.value);
                    audio.play();
                }
            </script>
             <!--  $.ajax(type:post, url:'files.php', data:{path:path},
                       success:function(data){
                           document.write(data);
                       } 
                    )-->
        </div>
    </body>
</html>

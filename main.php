<!DOCTYPE html>
<?php
if (!isset($_COOKIE['cookie'])) {
    if (!isset($_SERVER['HTTP_REFERER'])) {
        header('Location: index.php');
        exit;
    }
}
?>
<html>
    <head>
        <title>Music map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="mainStyle.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
    </head>

    <body style="background-image:url('images/waves.jpg')"  onload="initializeFunction()">
        <div class="block1">
            <img src='images/worldmap.png'>
            <input type="image" id="Russia" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="USA" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Canada" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Australia" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="NewZeland" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="SouthKorea" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="China" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Japan" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Europe" src='images/note_europe.png' onclick="location.href = 'europe.php'">
        </div>
        <div id="genre">
            <div id="classic">
                <input type="image" src="images/vinyl.png" onclick="changePosition(this)">
                <text>classic</text>
            </div>
            <div id="folk">
                <input type="image" src="images/vinyl.png" onclick="changePosition(this)">
                <text>folk</text>
            </div>
            <div id="rap">
                <input type="image" src="images/vinyl.png" onclick="changePosition(this)">
                <text>rap</text>
            </div>
            <div id="rock">  
                <input type="image" src="images/vinyl.png" onclick="changePosition(this)">
                <text>rock</text>
            </div>
            <div id="pop">
                <input type="image" src="images/vinyl.png" onclick="changePosition(this)">
                <text>pop</text>
            </div>
            <div id="jazz">
                <input type="image" src="images/vinyl.png" onclick="changePosition(this)">
                <text>jazz</text>
            </div>
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
            <input type="image" id='gramophone' src='images/gramophone.png' onclick='playOrPause()'>
            <input type="image" id='play' src='images/play.png' style="visibility: hidden;">
            <div id='songName'></div>
        </div>

        <div id='add'>
            <input type="image" id='vinyl' src="images/feather.png" onclick='location.href = "add_music/help_music.php"'>
        </div>
        <form action="logout.php" method="post" id="logout"> 
            <input type="image" style="outline:none;" src="images/coda.png" alt="Submit" id="exit">

        </form>        
    </body>
</html>

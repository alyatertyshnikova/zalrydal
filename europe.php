<!DOCTYPE html>
<html>
    <head>
        <title>Music map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="mainStyle.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
    </head>

    <body style="background-image:url('images/waves.jpg')" onload="buttons()">
        <div id="europe_map">
            <img src='images/europe.png' class="center-img">
            <input type="image" id="Ukraine" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Belarus" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Britain" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Island" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="France" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Germany" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Italy" name='country' src='images/note.png' onclick='playMusic(this)'>
            
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
        <div id="home">
        <input type="image" style="outline:none;" src="images/earth-music.png" onclick="location.href = 'main.php'">
        </div>
        <!--<form action="logout.php" method="post"> 
            <input type="image" style="outline:none;" src="images/coda.png" alt="Submit" id="exit">
        </form>-->
    </body>
</html>

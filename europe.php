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
        <link rel="import" href="main.php">
    </head>
    <body style="background-image:url('images/waves.jpg')" onload="initializeFunction()">
        <div id="europe_map">
            <img src='images/europe.png' class="center-img">
            <input type="image" id="Ukraine" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Belarus" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Britain" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Island" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="France" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Germany" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Italy" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Moldova" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Norway" name='country' src='images/note.png' onclick='playMusic(this)'>
            <input type="image" id="Ireland" name='country' src='images/note.png' onclick='playMusic(this)'>
        </div>
        <div id="home">
        <input type="image" style="outline:none;" src="images/earth-music.png" onclick="location.href = 'main.php'">
        </div>
    </body>

    <script>
        var link = document.querySelector("link[rel=import]");
        var genre = link.import.querySelector('#genre');
        document.body.appendChild(genre.cloneNode(true));
        var container = link.import.querySelector('#container');
        document.body.appendChild(container.cloneNode(true));
        var player = link.import.querySelector('#player');
        document.body.appendChild(player.cloneNode(true));
        var videoPlayer = link.import.querySelector('#videoPlayer');
        document.body.appendChild(videoPlayer.cloneNode(true));
        var add = link.import.querySelector('#vinyl');
        document.body.appendChild(add.cloneNode(true));
    </script>
</html>

<!DOCTYPE html>
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

    <body style="background-image:url('images/waves.jpg')" onload="buttons()">
        <img src='images/europe.png'>
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

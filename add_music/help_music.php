<!DOCTYPE html>
<html>
    <head>
        <title>Music Map</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            ::placeholder{
                color: black;
            }
            @font-face {
                font-family: 'Reckless Sample';
                font-style: normal;
                font-weight: normal;
                src: local('Reckless Sample'), url('../reckless_sample.woff') format('woff');
            }
            input[type="text"]{
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="song"]{
                position: absolute;
                left: 43%;
                top: 200px;
            }
            input[name="author"]{
                position: absolute;
                left: 43%;
                top: 240px;
            }
            input[name="country"]{
                position: absolute;
                left: 43%;
                top: 280px;
            }
            input[name="year"]{
                position: absolute;
                left: 43%;
                top: 320px;
            }
            input[name="file"]{
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
                position: absolute;
                left: 43%;
                top: 360px;
            }
            input[name="sendSong"]{
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
                position: absolute;
                left: 43%;
                top: 400px;
            }
        </style>
    </head>
    <body style ="background-image: url(../images/octopus.gif)">
        <audio src="../audio/all_through_the_night.wav" autoplay loop>
        </audio>
        <form action="upload_file.php" class="center-img" enctype="multipart/form-data" method="post"> 
            <input type="text" placeholder="Enter Song name" name="song" required>    
            <input type="text" placeholder="Enter Author name" name="author" required>
            <input type="text" placeholder="Enter Counrty" name="country" required>
            <input type="text" placeholder="Enter Year" name="year" required>
                <input type="file" name="file" required/>
            <input type="submit" name="sendSong" value="Upload">
        </form>
    </body>
</html>

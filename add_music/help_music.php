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
                left: 38%;
                width: 25%;
                top: 200px;
            }
            input[name="author"]{
                position: absolute;
                left: 38%;
                width: 25%;
                top: 240px;
            }
            input[name="country"]{
                position: absolute;
                left: 38%;
                width: 25%;
                top: 280px;
            }
            input[name="year"]{
                position: absolute;
                left: 38%;
                width: 25%;
                top: 320px;
            }
            input[name="genre"]{
                position: absolute;
                left: 38%;
                width: 25%;
                top: 360px;
            }
            #upload{
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
                position: absolute;
                left: 38%;
                top: 400px;
            }
            input[name="sendSong"]{
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
                position: absolute;
                left: 38%;
                width:8%;
                top: 440px;
            }
            #upload_visible{
                position: absolute;
                top: 400px;
                left:46%;
                width:17%;
            }
            #errorContent{
                position: absolute;
                top:160px;
                left:43%;
                font-family:'Reckless Sample';
                font-size: 20px;
            }
            #text{
                //position: absolute;
                top:0px;
                font-size: 20px;
                font-family:'Reckless Sample';
                text-align: center;                  
            }
            #home{
                outline: none;
                position: absolute;
                top:10px;
                left:10px;
            }
        </style>
    </head>
    <body style ="background-image: url(../images/octopus.gif)">
        <audio src="../music/audio/all_through_the_night.wav" autoplay loop>
        </audio>
        <div id='errorContent'>
            <?php
            include ('send.php');
            if (isset($_SESSION['Error'])) {
                echo $_SESSION['Error'];
                unset($_SESSION['Error']);
            }
            ?>
        </div>
    <center>
        <text id="text">
        Hello! 
        <p>Thank you for helping us creating the best music database that covers all the Earth and time. 
        <p>Please, write the name of the missing song using latin letters, try to use correct data and note genre that we have on a main page.
        <p>Hope you like it! See you on the dark side of the Moon!
            </text>
    </center>
    <input type="image" id="home" src="../images/earth-music.png" onclick="location.href = '../main.php'">
    <form action="send.php" class="center-img" enctype="multipart/form-data" method="post"> 
        <input type="text" placeholder="Enter Song name" name="song" required>    
        <input type="text" placeholder="Enter Author name" name="author" required>
        <input type="text" placeholder="Enter Counrty" name="country" required>
        <input type="text" placeholder="Enter Year" name="year" required>

        <input type="text" placeholder="Enter Genre" name="genre" required>
        <input type="submit" name="sendSong" value="Upload">
        <input type="file" name="fileToUpload" id="fileToUpload" style="display: none;"
               onchange="document.getElementById('upload_visible').value = this.value;" required>
        <input type="text" readonly="1" id="upload_visible" 
               onclick="document.getElementById('fileToUpload').click();" />
        <button id="upload" onclick="document.getElementById('fileToUpload').click();">Find File</button>
    </form>

</body>
</html>
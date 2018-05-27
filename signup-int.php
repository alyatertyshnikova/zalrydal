<!DOCTYPE html>
<?php include ('signup.php'); ?>
<html>
    <head>
        <title>TODO supply a title</title>
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
                src: local('Reckless Sample'), url('reckless_sample.woff') format('woff');
            }

            .center-img { 
                display: block; 
                margin: 0 auto; 
            } 
            input[name="name"]{
                position: absolute;
                left: 43%;
                top: 200px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="psw"]{
                position: absolute;
                left: 43%;
                top: 240px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="samepassword"]{
                position: absolute;
                left: 43%;
                top: 280px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="email"]{
                position: absolute;
                left: 43%;
                top: 320px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="registration"]{
                position: absolute;
                left: 43%;
                top: 360px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            #errorContent{
                position: absolute;
                left: 43%;
                top:400px;
                font-family:'Reckless Sample';
                font-size: 20px;
            }
        </style>
    </head>
    <body style ="background-image: url(images/octopus.gif)">
        <audio src="audio/all_through_the_night.wav" autoplay loop>
        </audio>
        <div id='errorContent'>
        <?php
        include ('signup.php');
        if (isset($_SESSION['Error'])) {
            echo $_SESSION['Error'];
            unset($_SESSION['Error']);
        }
        ?>
        </div>
        <form action="signup.php" class="center-img" method="post"> 
            <input type="text" placeholder="Enter Username" name="name" required>    
            <input type="password" placeholder="Enter Password" name="psw" required>
            <input type="password" placeholder="Repeat Password" name="samepassword" required>
            <input type="email" placeholder="Enter Email" name="email" required>
            <input type="submit" name="registration" value="Sign In">
        </form>
    </body>
</html>

<!DOCTYPE html>
<?php
if (isset($_COOKIE['cookie'])) {
    $cookie = $_COOKIE['cookie'];
    $browserInfo = get_browser(NULL, FALSE);
    $actualCookie = substr($cookie, 0, 8) . serialize($browserInfo);
    if (strcmp($actualCookie, $cookie) == 0) {
        header('Location: main.php');
    }
}
ob_start();
?>
<html>
    <head>
        <script src="sjcl.js"></script>

        <title>Music map</title>
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

            /*
            .center-img { 
                display: block; 
                margin: 0 auto; 
            } */
            input[name="email"]{
                position: absolute;
                left:0px;
                top:0px;
                width:200px;
                heith:25px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="psw"]{
                position: absolute;
                left:0px;
                top: 50px;
                width:200px;
                heith:25px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            input[name="submit"]{
                position: absolute;
                left:0px;
                top: 100px;
                width:98px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            #signup{
                position: absolute;
                left:106px;
                top:100px;
                width: 98px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            #login{
                position: absolute;
                left:0px;
                top:100px;
                width: 98px;
                font-size: 20px;
                color:black;
                font-family:'Reckless Sample';
                background-color:#008CDC;
                opacity: 0.5;
            }
            .block1{
                width:800px;
                height:600px;
                margin: auto;
                position:relative;
            }
            .block2{
                position:absolute;
                width:200px;
                heigh:150px;
                left:300px;
                top:225px;
            }
            #errorContent{
                position: absolute;
                top:130px;
                font-family:'Reckless Sample';
                font-size: 20px;
            }
        </style>   
    </head>
    <body style="background-color: #008CDC" > 
        <audio src="audio/all_through_the_night.wav" autoplay loop>
        </audio>
        <div class="block1">
            <img src="images/whales.gif" class="center-img">
            <div class="block2">
                <form action="login.php" class="center-img" method="POST"> 
                    <input type="text" placeholder="Enter Email" name="email" required> 
                    <input type="password" placeholder="Enter Password" name="psw" required> 
                    <input type="submit" name="submit" value="Log in">
                </form> 
                <button type='button' onclick='location.href = "signup-int.php"' id='signup'>
                    Sign Up
                </button>
                <div id='errorContent'>
                    <?php
                    include ('login.php');
                    if (isset($_SESSION['Error'])) {
                        echo $_SESSION['Error'];
                        unset($_SESSION['Error']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </body> 
</html>

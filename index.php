<!DOCTYPE html>
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

            /*
            .center-img { 
                display: block; 
                margin: 0 auto; 
            } */
            input[name="name"]{
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
        </style>   
    </head>
    <body style="background-color: #008CDC" > 
        <audio src="audio/all_through_the_night.wav" autoplay loop>
        </audio>
        <div class="block1">
            <img src="images/whales.gif" class="center-img"> 
            <div class="block2">
                <form action="login.php" class="center-img" method="POST"> 
                    <input type="text" placeholder="Enter Username" name="name" required> 
                    <input type="password" placeholder="Enter Password" name="psw" required> 
                    <input type="submit" name="submit" value="Log in">
                </form> 
                <button type='button' onclick='location.href = "signup.html"' id='signup'>
                    Sign Up
                </button>
            </div>
        </div>
    </body> 
</html>

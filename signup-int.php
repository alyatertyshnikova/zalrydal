<!DOCTYPE html>
<?php include ('signup.php'); ?>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
            #signup_button{
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
        <audio src="music/audio/all_through_the_night.wav" autoplay loop>
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
        <input type="text" placeholder="Enter Username" name="name" id="name" required>    
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
        <input type="password" placeholder="Repeat Password" name="samepassword" id="same_psw" required>
        <input type="email" placeholder="Enter Email" name="email" id="email" required>
        <button type="button" onclick="signup();" id="signup_button"> 
            Sign Up 
        </button> 

        <script>

            function signup()
            {
                var name = document.getElementById("name").value;
                var email = document.getElementById("email").value;
                var raw_password = document.getElementById("psw").value;
                var same_psw = document.getElementById("same_psw").value;

                $.ajax({
                    type: "POST",
                    url: "signup.php",
                    data: {
                        email: email,
                        name: name
                    },
                    dataType: "text",
                    success: function (result) {
                        if (result == -1)
                            document.location.replace("signup-int.php");
                        else {
                            var salt = JSON.parse(result);
                            var pwd_salt = raw_password.concat(salt);
                            var out = sjcl.hash.sha256.hash(pwd_salt);
                            var hash = sjcl.codec.hex.fromBits(out);
                            var same_pwd_salt = same_psw.concat(salt);
                            var same_out = sjcl.hash.sha256.hash(same_pwd_salt);
                            var same_hash = sjcl.codec.hex.fromBits(same_out);

                            $.ajax({
                                type: "POST",
                                url: "signup.php",
                                data: {
                                    email: email,
                                    name: name,
                                    hash: hash,
                                    same_hash: same_hash,
                                    salt: salt
                                },
                                success: function (data) {
                                    if (data == 1)
                                        document.location.replace("main.php");
                                    else
                                        document.location.replace("signup-int.php");

                                }
                            });
                        }
                    }
                });
            }
        </script>

    </body>
</html>

<!DOCTYPE html>
<?php
include ('config.php');
if (isset($_COOKIE['cookie']) and isset($_COOKIE['email'])) {
    $cookie = $_COOKIE['cookie'];
    $random = substr($cookie, 0, 32);
    $random_hashed = hash("sha256", $random);
    $query = mysqli_query($link, "SELECT email FROM users WHERE cookie='$random_hashed' LIMIT 1");
    
    if ($query != NULL) {
        $result = mysqli_fetch_all($query);
        $email_from_bd = $result[0];
        $email_from_cookie = $_COOKIE['email'];
        
        if (strcmp($email_from_bd,$email_from_cookie)==0) {
            $browserInfo = get_browser(NULL, FALSE);
            $actualCookie = $random . serialize($browserInfo);
            
            if (strcmp($actualCookie, $cookie) == 0) {
                header('Location: main.php');
            }
        }
    }
}
ob_start();
?>
<html>
    <head>
        <script src="sjcl.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
            #login_button{
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
                width:200px;
                position: absolute;
                top:130px;
                font-family:'Reckless Sample';
                font-size: 20px;
            }
        </style>   
    </head>
    <body style="background-color: #008CDC" > 
        <audio src="music/audio/all_through_the_night.wav" autoplay loop>
        </audio>
        <div class="block1">
            <img src="images/whales.gif" class="center-img">

            <div class="block2"> 
                <input type="email" placeholder="Enter Email" id="email" name="email" required> 
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required> 
                <button type="button" onclick="login();" id="login_button"> 
                    Log In 
                </button> 
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
        <script type="text/javascript" src="check_data.js"></script>
        <script>

                    function login()
                    {
                        var email = document.getElementById("email").value;
                        var raw_password = document.getElementById("psw").value;
                        error = checkEmail(email);
                        if (error != null) {
                            document.getElementById('errorContent').innerHTML = error;
                            return;
                        }

                        error = checkPassword(raw_password);
                        if (error != null) {
                            document.getElementById('errorContent').innerHTML = error;
                            return;
                        }
                        $.ajax({
                            type: "POST",
                            url: "login.php",
                            data: {
                                email: email
                            },
                            success: function (salt) {
                                if (salt == -1)
                                    document.location.replace("index.php");
                                else {
                                    var pwd_salt = raw_password.concat(JSON.parse(salt));
                                    var out = sjcl.hash.sha256.hash(pwd_salt);
                                    var hash = sjcl.codec.hex.fromBits(out);
                                    //alert(hash);

                                    $.ajax({
                                        type: "POST",
                                        url: "login.php",
                                        data: {
                                            email: email,
                                            hash: hash
                                        },
                                        success: function (data) {
                                            if (data == 0)
                                                document.location.replace("admin/admin_page.php");
                                            else if (data == 1)
                                            document.location.replace("main.php");
                                            else if (data == -1)
                                                document.location.replace("index.php");
                                        }
                                    });
                                }
                            }
                        });
                    }
        </script>

    </body> 
</html>

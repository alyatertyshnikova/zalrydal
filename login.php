<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ('config.php');
if (isset($_POST['email'])) {
    if (isset($_POST['hash'])) {
        $query = mysqli_query($link, "SELECT password FROM users WHERE email='" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1");
        $data = mysqli_fetch_assoc($query);

        if (password_verify($_POST['hash'], $data['password'])) {
            if (strcmp($_POST['email'], "admin") == 0) {
                echo 0; //admin
            } else {
                $email = $_POST['email'];
                $browserInfo = get_browser(NULL, FALSE);
                $random = random_bytes(32);

                $random_in_use = 1;
                while ($random_in_use == 1) {
                    $random_hashed = hash("sha256",$random);
                    $randomQuery = "SELECT * FROM users WHERE cookie='$random_hashed'";
                    $result = mysqli_query($link, $randomQuery);
                    if (mysqli_num_rows($result) == 0) {
                        $random_in_use = 0;
                    }
                    else{
                        $random = random_bytes(32);
                    }
                }

                $cookie = $random . serialize($browserInfo);
                setcookie("cookie", $cookie, time() + (3600 * 24 * 30));
                setcookie("email", $email, time() + (3600 * 24 * 30));
                $query = mysqli_query($link, "UPDATE users SET cookie='$random_hashed' WHERE email='$email'");

                echo 1; //user
            }
        } else {
            $_SESSION['Error'] = "Incorrect login or password.";
            echo -1; //not authorizwd
        }
    } else {
        //get salt
        $query = "SELECT salt FROM users WHERE email='" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) == 0) {
            $_SESSION['Error'] = "Incorrect login or password.";
            echo -1; //not authorizwd
        } else {
            $data = mysqli_fetch_assoc($result);
            echo json_encode($data['salt']);
        }
    }
}
?>

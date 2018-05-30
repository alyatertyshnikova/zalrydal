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
                $cookie = $random . serialize($browserInfo);
                setcookie("cookie", $cookie, time() + (3600 * 24 * 30));
                $query = mysqli_query($link, "UPDATE users SET cookie='$random' WHERE email='$email'");
               // $data = mysqli_fetch_assoc($query);

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

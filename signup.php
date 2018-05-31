<?php

include ('config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['email']) and isset($_POST['name'])) {
    if (isset($_POST['hash']) and isset($_POST['same_hash']) and isset($_POST['salt'])) {
        $email = ($_POST['email']);
        $name = ($_POST['name']);
        $hash = ($_POST['hash']);
        $same_hash = ($_POST['same_hash']);
        $salt = ($_POST['salt']);

        if ($hash == $same_hash) {
            $hashash = password_hash($hash, PASSWORD_BCRYPT);
            $addQuery = "INSERT INTO users(name, password, email, salt) VALUES('$name', '$hashash', '$email', '$salt');";
            $result = mysqli_query($link, $addQuery);
            if ($result) {
                $email = $_POST['email'];
                $browserInfo = get_browser(NULL, FALSE);
                $random = random_bytes(32);

                $random_in_use = 1;
                while ($random_in_use == 1) {
                    $random_hashed = hash("sha256", $random);
                    $randomQuery = "SELECT * FROM users WHERE cookie='$random_hashed'";
                    $result = mysqli_query($link, $randomQuery);
                    if (mysqli_num_rows($result) == 0) {
                        $random_in_use = 0;
                    } else {
                        $random = random_bytes(32);
                    }
                }

                $cookie = $random . serialize($browserInfo);
                setcookie("cookie", $cookie, time() + (3600 * 24 * 30));
                setcookie("email", $email, time() + (3600 * 24 * 30));
                $query = mysqli_query($link, "UPDATE users SET cookie='$random_hashed' WHERE email='$email'");

                unset($name);
                unset($email);
                unset($hash);
                unset($same_hash);
                unset($res);
                echo 1;
            } else {
                $_SESSION['Error'] = "Something went wrong.";
                echo -1;
            }
        } else {
            $_SESSION['Error'] = "Password mismatch.";
            echo -1;
        }
    } else {
        //get salt
        global $error, $nameError;
        $error = false;
        $email = ($_POST['email']);
        $name = ($_POST['name']);

        if (empty($name) || strlen($name) > 30) {
            $error = true;
            $nameError = "Name should have from 0 to 30 length";
        } else if (!preg_match('/\w+/', $name)) {
            $error = true;
            $nameError = "Name should contain only digits, characters or underscore";
        } else if (empty($email) || !filter_var(FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $nameError = "Email should be valid";
        } else {
            $emailQuery = "SELECT email FROM users WHERE email='$email'";
            $result = mysqli_query($link, $emailQuery);
            if (mysqli_num_rows($result) != 0) {
                $error = true;
                $nameError = "This email is already in use.";
            }
        }
        if (!$error) {
            $salt = random_bytes(4);
            $res = bin2hex($salt);
            echo json_encode($res);
        } else {
            $_SESSION['Error'] = $nameError;
            echo -1;
        }
    }
}
?>
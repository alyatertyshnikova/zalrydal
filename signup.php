<?php

include ('config.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['registration'])) {
    global $error, $nameError;
    $name = ($_POST['name']);
    $password = ($_POST['psw']);
    $confirmPassword = ($_POST['samepassword']);
    $email = ($_POST['email']);
    $error = false;
    if (empty($name) || strlen($name) > 30) {
        $error = true;
        $nameError = "Name should have from 0 to 30 length";
    } else if (!preg_match('/\w+/', $name)) {
        $error = true;
        $nameError = "Name should contain only digits, characters or underscore";
    }
    if (empty($password)) {
        $error = true;
        $nameError = "Password should have from 0 to 30 length";
    } else if (!preg_match("/\w+/", $password)) {
        $error = true;
        $nameError = "Password should contain only digits, characters or underscore";
    }
    if ($password != $confirmPassword) {
        $error = true;
        $nameError = "Passwords are not the same";
    }
    if (empty($email) || !filter_var(FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $nameError = "Email should be validate";
    } else {
        $emailQuery = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($link, $emailQuery);
        if (mysqli_num_rows($result) != 0) {
            $error = true;
            $_SESSION['Error'] = "This email is already in use.";
            header('Location: signup-int.php');
        }
    }
    if (!$error) {
        $options=[cost=>12];
        $hash= password_hash($password, PASSWORD_BCRYPT);
        $addQuery = "INSERT INTO users(name, password, email) VALUES('$name', '$hash', '$email');";
        $result = mysqli_query($link, $addQuery);
        if ($result) {
            unset($name);
            unset($email);
            unset($pass);
            header('Location: main.html');
        }
    } else {
        header('Location: signup-int.php');
        echo $nameError;
    }
}
?>
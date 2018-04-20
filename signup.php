<?php
include ('config.php');
session_start();

if (isset($_POST['registration'])) {
    if(!empty($nameError)){
        unset($nameError);
    }
    $name = ($_POST['name']);
    $password = ($_POST['password']);
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
    if (empty($password) || strlen($password) > 30) {
        $error = true;
        $nameError = "Password should have from 0 to 30 length";
    } else if (!preg_match("/\w+/", $password)) {
        $error = true;
        $nameError = "Password should contain only digits, characters or underscore";
    }
    if ($password!=$confirmPassword) {
        $error = true;
        echo $password;
        echo $confirmPassword;
        $nameError = "Passwords are not the same";
    }
    if (empty($email) || !filter_var(FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $nameError = "Email should be validate";
    } else {
        $emailQuery = "SELECT email FROM users WHERE email=$email";
        $result = mysqli_query($link, $emailQuery);
        $resultLength = mysqli_num_rows($result);
        if ($resultLength != 0) {
            $error = true;
            $errorName = "Email is already in use";
        }
    }
    if (!$error) {
        $addQuery = "INSERT INTO users(name, password, email) VALUES('$name', '$password', '$email');";
        $result = mysqli_query($link, $addQuery);
        if(!$result)            echo 'no';
        if ($result) {
            unset($name);
            unset($email);
            unset($pass);
        }
        header('Location: index.html');
    } else {
        echo $nameError;
    }
}
?>
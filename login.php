<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ('config.php');
if (isset($_POST['submit'])) {
    $query = mysqli_query($link, "SELECT password FROM users WHERE email='" . mysqli_real_escape_string($link, $_POST['email']) . "' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if (password_verify($_POST['psw'], $data['password'])) {
        if(strcmp($_POST['email'], "admin")==0){
            header('Location: admin/admin_page.php');
        }
        else{
        $cookie=sha1($_POST['email']);
        $email=$_POST['email'];
        setcookie("cookie", $cookie);
        setcookie("email", $email);
        header('Location: main.php');
        }
    } else {
        $_SESSION['Error'] = "Incorrect login or password.";
        header('Location: index.php');
    }
}
?>

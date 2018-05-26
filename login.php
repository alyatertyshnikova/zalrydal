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
        $email=$_POST['email'];
        $browserInfo= get_browser(NULL, FALSE);
        $cookie= random_bytes(8).serialize($browserInfo);
        setcookie("cookie", $cookie, time()+(3600*24*30));
        setcookie("email", $email, time()+(3600*24*30));
        header('Location: main.php');
        }
    } else {
        $_SESSION['Error'] = "Incorrect login or password.";
        header('Location: index.php');
    }
}
?>

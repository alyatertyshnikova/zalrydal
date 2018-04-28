<?php
// Страница авторизации
include ('config.php');
// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняется введенному
    $query = mysqli_query($link,"SELECT id, password FROM users WHERE name='".mysqli_real_escape_string($link,$_POST['name'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['password'] == ($_POST['psw']))//md5(md5($_POST['psw'])))
    {
        // Генерируем случайное число и шифруем его
        //$hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации и IP
        //mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        // Ставим куки
        //setcookie("id", $data['user_id'], time()+60*60*24*30);
        //setcookie("hash", $hash, time()+60*60*24*30,null,null,null,true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        //header("Location: check.php"); exit();
        
        header('Location: main.html'); exit();
    }
    else
    {
        print "Incorrect password";
    }
}
?>

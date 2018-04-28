<?php
include ('config.php');
if(isset($_POST['submit']))
{
    $query = mysqli_query($link,"SELECT id, password FROM users WHERE name='".mysqli_real_escape_string($link,$_POST['name'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    if($data['password'] == ($_POST['psw'])){
        header('Location: main.html');
    }
    else
    {
        print "Incorrect password";
    }
}
?>

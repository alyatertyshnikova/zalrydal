<?php
include ('../config_music.php');
if(isset($_POST['index'])){
    $selected=$_POST['index'];
    $getQuery = "SELECT link FROM new_songs WHERE id='$selected'";
    $result = mysqli_query($link, $getQuery);
    $path = "../music/new_songs/" . mysqli_fetch_assoc($result)['link'];
    
    unlink($path);
    
    $getQuery = "DELETE FROM new_songs WHERE id='$selected'";
    $result = mysqli_query($link, $getQuery);
    
}


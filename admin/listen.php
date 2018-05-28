<?php
include ('../config_music.php');
if(isset($_POST['data'])){
    $data=$_POST['data'];
    $getQuery = "SELECT link FROM new_songs WHERE year='$data[0]' AND country='$data[1]'"
            . "AND song='$data[2]' AND author='$data[3]' AND genre='$data[4]'";
    $result = mysqli_query($link, $getQuery);
   $path = "../music/new_songs/" . mysqli_fetch_assoc($result)['link'];
   echo $path;
}
?>

<?php
include ('config_music.php');
$getQuery = "SELECT * FROM new_songs";
$result = mysqli_query($link, $getQuery);
$array = mysqli_fetch_all($result);
echo json_encode($array);

?> 

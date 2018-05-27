<?php
include ('config_music.php');
if (isset($_POST['year']) && isset($_POST['country'])) {
    $year = $_POST['year'];
    $country = $_POST['country'];
    $genre=$_POST['genre'];
    if($genre!=NULL){
      $getQuery = "SELECT link, song, author FROM audio WHERE year='$year' AND country='$country' AND genre='$genre'";
    }
    else{
    $getQuery = "SELECT link, song, author FROM audio WHERE year='$year' AND country='$country'";
    }
    $result = mysqli_query($link, $getQuery);
    $array = mysqli_fetch_all($result);
    $number=rand(0, count($array)-1);
    $row=$array[$number];
    echo json_encode($row);
}
?>


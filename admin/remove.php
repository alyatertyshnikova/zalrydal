<?php

include ('../config_music.php');
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $year = mysqli_real_escape_string($link, $data[0]);
    $country = mysqli_real_escape_string($link, $data[1]);
    $song = mysqli_real_escape_string($link, $data[2]);
    $author = mysqli_real_escape_string($link, $data[3]);
    $genre = mysqli_real_escape_string($link, $data[4]);
    $getQuery = "SELECT link FROM new_songs WHERE year='$year' AND country='$country'"
            . "AND song='$song' AND author='$author' AND genre='$genre'";
    $result = mysqli_query($link, $getQuery);
    $path = "../music/new_songs/" . mysqli_fetch_assoc($result)['link'];

    unlink($path);
    $deleteQuery = "DELETE FROM new_songs WHERE year='$year' AND country='$country'"
                . "AND song='$song' AND author='$author' AND genre='$genre'";
    $result = mysqli_query($link, $deleteQuery);
}


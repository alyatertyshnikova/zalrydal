<?php

include ('../config_music.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $getSong = "SELECT song, author, country, year, link FROM new_songs WHERE id='$id'";
    $result = mysqli_query($link, $getSong);
    $genre="regular";
    $info= mysqli_fetch_row($result);
    $addSong="INSERT INTO audio(year, country, link, author, song, genre) VALUES('$info[3]', '$info[2]', '$info[4]', '$info[1]', '$info[0]', '$genre');";
    $result = mysqli_query($link, $addSong);
}


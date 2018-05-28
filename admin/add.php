<?php
include ('../config_music.php');
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $getSong = "SELECT link FROM new_songs WHERE year='$data[0]' AND country='$data[1]'"
            . "AND song='$data[2]' AND author='$data[3]' AND genre='$data[4]'";
    $result = mysqli_query($link, $getSong);
    $filename = mysqli_fetch_assoc($result)['link'];
    $path = "../music/new_songs/" . $filename;
    $newpath = "../music/audio/" . $filename;
    copy($path, $newpath);
    unlink($path);
   // $result = mysqli_query($link, $getSong);
   // $info= mysqli_fetch_row($result);
    $addSong="INSERT INTO audio(year, country, link, author, song, genre) VALUES('$data[0]', '$data[1]', '$filename', '$data[3]', '$data[2]', '$data[4]');";
    $result = mysqli_query($link, $addSong);
    /*$genre="regular";
    $year= mysqli_fetch_assoc($result)['year'];
    $country= mysqli_fetch_assoc($result)['country'];
    $author= mysqli_fetch_assoc($result)['author'];
    $song= mysqli_fetch_assoc($result)['song'];
    $li = mysqli_fetch_assoc($result)['link'];
    $addSong="INSERT INTO audio (year, country, link, author, song, genre) VALUES('$year', '$country', '$li', '$author', '$song', '$genre');";
    $result = mysqli_query($link, $addSong);
    
    $getQuery = "DELETE FROM new_songs WHERE id='$id'";
    $result = mysqli_query($link, $getQuery);*/
}

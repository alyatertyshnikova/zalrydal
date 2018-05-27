<?php
include ('../config_music.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $getSong = "SELECT song, author, country, year, link FROM new_songs WHERE id='$id'";
    $result = mysqli_query($link, $getSong);
    
    $filename = mysqli_fetch_assoc($result)['link'];
    $path = "../music/new_songs/" . $filename;
    $newpath = "../music/audio/" . $filename;
    copy($path, $newpath);
    unlink($path);
    
    $genre="regular";
    $result = mysqli_query($link, $getSong);
    $info= mysqli_fetch_row($result);
    $addSong="INSERT INTO songs(year, country, link, author, song, genre) VALUES('$info[3]', '$info[2]', '$info[4]', '$info[1]', '$info[0]', '$genre');";
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
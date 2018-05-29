<?php

include ('../config_music.php');
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $year = mysqli_real_escape_string($link, $data[0]);
    $country = mysqli_real_escape_string($link, $data[1]);
    $song = mysqli_real_escape_string($link, $data[2]);
    $author = mysqli_real_escape_string($link, $data[3]);
    $genre = mysqli_real_escape_string($link, $data[4]);
    $getSong = "SELECT link FROM new_songs WHERE year='$year' AND country='$country'"
            . "AND song='$song' AND author='$author' AND genre='$genre'";
    $result = mysqli_query($link, $getSong);
    if ($result) {
        $filename = mysqli_fetch_assoc($result)['link'];
        $filename_sql = addslashes($filename);
        echo $filename_sql;
        $path = "../music/new_songs/" . $filename;
        $newpath = "../music/audio/" . $filename;
        copy($path, $newpath);
        unlink($path);

        $addSong = "INSERT INTO audio(year, country, link, author, song, genre) VALUES('$year', '$country', '$filename_sql', '$author', '$song', '$genre');";
        $result = mysqli_query($link, $addSong);

        $deleteQuery = "DELETE FROM new_songs WHERE year='$year' AND country='$country'"
                . "AND song='$song' AND author='$author' AND genre='$genre'";
        $result = mysqli_query($link, $deleteQuery);
    }
}  
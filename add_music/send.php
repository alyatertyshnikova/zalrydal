<?php
function getMimeType($filename) {
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mimetype = finfo_file($finfo, $filename);
    finfo_close($finfo);
    return $mimetype;
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include ('../config_music.php');
ini_set('display_errors',1);
error_reporting(E_ALL);
if (isset($_POST['sendSong'])) {
    $song = mysqli_real_escape_string($link, $_POST['song']);
    $author = mysqli_real_escape_string($link, $_POST['author']);
    $country = mysqli_real_escape_string($link, $_POST['country']);
    $year = mysqli_real_escape_string($link, $_POST['year']);
    if(isset($_COOKIE['email'])){
        $user = $_COOKIE['email'];
        }
        else{
        $user = "anonymous";   
        }
    $genre = mysqli_real_escape_string($link, $_POST['genre']);
    $fileName = $author . " - " . $song .".mp3";
    
    $song_name = $_POST['song'];
    $author_name = $_POST['author'];
    $target_main_dir = "../music/audio/";
    $target_main_file = $target_main_dir . $author_name . " - " . $song_name .".mp3";
    $target_dir = "../music/new_songs/";
    $target_file = $target_dir . $author_name . " - " . $song_name .".mp3";

    $mp3_mimes = array('audio/mpeg', 'audio/x-mpeg', 'audio/mpeg3', 'audio/x-mpeg-3');
    $uploadOk = 1;
    // Allow certain file formats
    if (!in_array(getMimeType($_FILES["fileToUpload"]["tmp_name"]), $mp3_mimes)) {
         $_SESSION['Error'] =  "File type should be MP3.";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['Error'] =   "Sorry, file already exists.";
        $uploadOk = 0;
    }
    if (file_exists($target_main_file)) {
        $_SESSION['Error'] =   "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size is less then 20 Mb
    if ($_FILES["fileToUpload"]["size"] > 20971520) {
        $_SESSION['Error'] =   "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        header('Location: help_music.php');
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $send = "INSERT INTO new_songs(song, author, country, year, user, link, genre) VALUES('$song', '$author', '$country', '$year', '$user', '$fileName', '$genre');";
            $result = mysqli_query($link, $send);
            
            $_SESSION['Error'] = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            header('Location: help_music.php');
        } else {
            $_SESSION['Error'] =  "Sorry, there was an error while uploading your file.";
            header('Location: help_music.php');
        }
    }
}

?>
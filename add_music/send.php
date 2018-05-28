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
if (isset($_POST['sendSong'])) {
    $song = $_POST['song'];
    $author = $_POST['author'];
    $country = $_POST['country'];
    $year = $_POST['year'];
    $user = $_COOKIE['email'];
    $filename = $_FILES["fileToUpload"]["name"];
    $target_dir = "../music/new_songs/";
    $target_file = $target_dir . $author . " - " . $song .".mp3";
    
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
    // Check file size is less then 20 Mb
    if ($_FILES["fileToUpload"]["size"] > 20971520) {
        $_SESSION['Error'] =   "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        header('Location: help_music.php');
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $send = "INSERT INTO new_songs(song, author, country, year, user, link) VALUES('$song', '$author', '$country', '$year', '$user', '$filename');";
            $result = mysqli_query($link, $send);
            
            $_SESSION['Error'] = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            header('Location: help_music.php');
        } else {
            $_SESSION['Error'] =  "Sorry, there was an error uploading your file.";
            header('Location: help_music.php');
        }
    }
}
?>
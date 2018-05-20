<?php
include ('config_music.php');
if (isset($_POST['sendSong'])) {
$song=$_POST['song'];
$author=$_POST['author'];
$country=$_POST['country'];
$year=$_POST['year'];
$user=$_COOKIE['email'];
$source="sdfghjk";
$help="INSERT INTO new_songs(song, author, country, year, user, link) VALUES('$song', '$author', '$country', '$year', '$user', '$source');";
$result = mysqli_query($link, $help);
header('Location: help_music.php');
}
?>


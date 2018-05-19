<?php
include ('config_music.php');
if (isset($_POST('year')) && isset($_POST('country'))) {
    $year = $_POST('year');
    $country = $_POST('country');
    $getQuery = "SELECT link, song, author FROM audio WHERE year='$year' AND country='$country'";
    $result = mysqli_query($link, $getQuery);
    $fieldInfo = mysqli_fetch_fields($result);
    echo $fieldInfo;
}
?>


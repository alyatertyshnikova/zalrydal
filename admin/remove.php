<?php
include ('../config_music.php');
if(isset($_POST['index'])){
    $selected=$_POST['index'];
    print $selected;
    $getQuery = "DELETE FROM new_songs WHERE id='$selected'";
    $result = mysqli_query($link, $getQuery);
}


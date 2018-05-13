


<?php

function countFolder($dir) {
    return (count(scandir($dir)) - 2);
}

if (isset($_POST['path'])) {
    $dir = $_POST['path'];
    if (!is_dir($dir)) {
        $count = 0;
    } else {
        $count = countFolder($dir);
    }
     echo $count;
     
} else {
    echo "otstoi";
}
?>
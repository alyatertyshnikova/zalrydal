


<?php 

function countFolder($dir) {
 return (count(scandir($dir)) - 2);
}

if (isset($_POST['path']))
{
    $dir=$_POST['path'];
    $count = countFolder($dir);
    echo $count;
}
 else {
    echo "otstoi";     
 }


?>
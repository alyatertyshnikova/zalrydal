<?php
if (isset($_POST['exit'])) {
setcookie("cookie", "", time() - 3600);
header('Location: index.php');
}
?>


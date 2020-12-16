<?php
session_start();
$_SESSION['user'] = "";
session_destroy();
echo "<script type='text/javascript'>window.location.href = '../login.php' ; </script>";

?>
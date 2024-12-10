<?php
$id = $_COOKIE['user'];
echo $id;
setcookie('user', $id, time()+(-3600), '/');
header("Location: ./index.php");
?>
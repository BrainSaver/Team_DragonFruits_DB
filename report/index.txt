<?php 
if(isset($_COOKIE['user'])) header("Location: ./dashboard.php");
else header("Location: ./AccountManager/loginPage.php");
?>
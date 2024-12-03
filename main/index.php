<?php 
if(isset($_COOKIE['user'])) include("./dashboard.php");
else include("./AccountManager/loginPage.php");
?>
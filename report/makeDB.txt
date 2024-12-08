<?php
    $conn = mysqli_connect('localhost', 'root', '***REMOVED***');
    $sql = "CREATE DATABASE IF NOT EXISTS df";
    mysqli_query($conn, $sql);
?>

<?php
    $conn = mysqli_connect('localhost', 'root', '***REMOVED***');
    mysqli_select_db($conn, 'df');

    $sql = "create table userdata (id varchar(20) not null, pw varchar(512) not null, email varchar(256) not null, primary key(id)) DEFAULT CHARSET=utf8;";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
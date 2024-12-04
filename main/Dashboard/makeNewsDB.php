<?php
    /*
    $conn = mysqli_connect('localhost', 'root', '***REMOVED***');
    $sql = "create database news";

    mysqli_query($conn, $sql);
    */
?>

<?php
    $conn = mysqli_connect('localhost', 'root', '***REMOVED***');
    mysqli_select_db($conn, 'news');

    $sql = "create table article (title varchar(20) not null, description varchar(512) not null, url varchar(256) not null)";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

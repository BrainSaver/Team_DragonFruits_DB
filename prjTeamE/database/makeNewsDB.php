<?php
    require_once __DIR__ . '/../config.php';

    $conn = mysqli_connect(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));
    $sql = "CREATE DATABASE IF NOT EXISTS news";

    mysqli_query($conn, $sql);
    
?>

<?php
    $conn = mysqli_connect(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));
    mysqli_select_db($conn, 'news');

    $sql = "create table article (title varchar(512) not null, description varchar(512) not null, url varchar(256) not null)";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

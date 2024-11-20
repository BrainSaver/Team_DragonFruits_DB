<?php
    $id = isset($_POST['id']) ? $_POST['id'] : ''; 
    $pw = isset($_POST['pw']) ? $_POST['pw'] : ''; 
    $email = isset($_POST['email']) ? $_POST['email'] : ''; 

    $conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
    mysqli_select_db($conn, 'df');

    $sql = "insert into poll (";
    $sql .= " id, pw, email) values (";
    $sql .= "'" . $id . "',";
    $sql .= "'" . $pw . "',";
    $sql .= "'" . $email. "'";
    $sql .= ");";
?>
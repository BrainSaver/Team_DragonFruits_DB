<?php 
    $conn = mysqli_connect('localhost', 'root', '***REMOVED***');
    mysqli_select_db($conn, 'df');
    $id = isset($_POST['id']) ? $_POST['id'] : ''; 
    $pw = isset($_POST['pw']) ? $_POST['pw'] : ''; 
    $email = isset($_POST['email']) ? $_POST['email'] : ''; 

    $conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
    mysqli_select_db($conn, 'df');

    $sql = "insert into userdata (";
    $sql .= " id, pw, email) values (";
    $sql .= "'" . $id . "',";
    $sql .= "SHA2(SHA2('" . $pw . "',256),256),";
    $sql .= "'" . $email. "'";
    $sql .= ");";
    echo $sql;
    if(!mysqli_query($conn, $sql)) echo "error"; 
    mysqli_close($conn); 
?>

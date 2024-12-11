<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');

$id = isset($_POST['id']) ? $_POST['id'] : '';
$pw = isset($_POST['pw']) ? $_POST['pw'] : '';
$id = mysqli_real_escape_string($conn, $id);
$pw = mysqli_real_escape_string($conn, $pw);
$sql = "SELECT * FROM userdata WHERE id = '".$id."' AND pw = sha2(sha2('".$pw."', 256),256)";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row != NULL) {
    setcookie('user', $id, time() + (3600), "/");
    header("Location: ../dashboard.php");// 대시보드 페이지로 이동
    //페이지 이동할때 이렇게 해야할듯

}
else header("Location: ./accessDenied.html");
mysqli_close($conn); 
?>
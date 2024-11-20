<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $pw = $_POST['pw'];
}
$sql = "SELECT * FROM user"

mysqli_close($conn); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
</head>
<body>
    <form method="POST" action="">
        아이디: <input type="text" name="id" required><br>
        비밀번호: <input type="password" name="id" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>

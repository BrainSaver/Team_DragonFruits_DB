<?php 
$conn = mysqli_connect('localhost', 'root', '***REMOVED***', 'df');
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$id = isset($_POST['id']) ? $_POST['id'] : ''; 
$pw = isset($_POST['pw']) ? $_POST['pw'] : ''; 
$email = isset($_POST['email']) ? $_POST['email'] : ''; 

$id = mysqli_real_escape_string($conn, $id);
$pw = mysqli_real_escape_string($conn, $pw);
$email = mysqli_real_escape_string($conn, $email);

$sql = "SELECT * FROM userdata WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row_exists = true;
} else {
    $sql = "INSERT INTO userdata (id, pw, email) VALUES (
        '$id',
        SHA2(SHA2('$pw', 256), 256),
        '$email'
    )";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        exit;
    }
    $row_exists = false;
}

mysqli_close($conn);

if ($row_exists): ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기 결과</title>
</head>
<body>
    <div class="login-box">
        <h2>아이디 찾기 결과</h2>
        <div class="result">
            <p>해당 아이디로 등록된 계정이 이미 존재합니다</p>
            <button class="btn" onclick="location.href='./makeAccount.php'">돌아가기</button>
        </div>
    </div>
</body>
</html>
<?php else: 
    setcookie('user', $id, time() + (3600), "/");
    header("Location: ../index.php");
    exit;
endif; ?>

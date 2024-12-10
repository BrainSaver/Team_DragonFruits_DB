<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = mysqli_real_escape_string($conn, $email);
$sql = "SELECT * FROM userdata WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error executing query: " . mysqli_error($conn);
    exit;
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

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
            <?php if ($row): ?>
                <p>회원님의 아이디는 <strong><?php echo htmlspecialchars($row['id']); ?></strong>입니다.</p>
                <button class="btn" onclick="location.href='./loginPage.php'">로그인</button>
            <?php else: ?>
                <p>입력하신 이메일로 등록된 아이디가 없습니다.</p>
                <button class="btn" onclick="location.href='./findID.php'">다시 시도하기</button>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php mysqli_close($conn); ?>

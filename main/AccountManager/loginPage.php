<?php 
if (isset($_COOKIE['user'])) include("../dashboard.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="StyleSheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <div class="login-box">
        <h2>로그인</h2>
        <form method="POST" action="./loginReply.php">
            <div class="form-group">
                <label for="id">아이디:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="pw">비밀번호:</label>
                <input type="password" id="pw" name="pw" required>
            </div>
            <p><a href="./findId.php">아이디 찾기</a><br>
            <a href="./makeAccount.php">회원가입</a></p>
            <input type="submit" value="로그인">
        </form>
    </div>
</body>
</html>
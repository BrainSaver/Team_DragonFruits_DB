<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="StyleSheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <div class="login-box">
        <h2>회원가입</h2>
        <form method="POST" action="./makeAccountReply.php">
            <div class="form-group">
                <label for="id">아이디:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="pw">비밀번호:</label>
                <input type="password" id="pw" name="pw" required>
            </div>
            <div class="form-group">
                <label for="pw">이메일:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <input type="submit" value="회원가입">
        </form>
    </div>
</body>
</html>
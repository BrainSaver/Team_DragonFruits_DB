<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <div class="login-box">
        <h2>로그인</h2>
        <form method="POST" action="./loginReply.php">
            <div class="form-group">
                <input type="text" id="id" name="id" placeholder="아이디를 입력하세요" required>
            </div>
            <div class="form-group">
                <input type="password" id="pw" name="pw" placeholder="비밀번호를 입력하세요" required>
            </div>
            <div class="links">
                <a href="./findId.php">아이디 찾기</a>
            </div>
            <div class="button-group">
                <input type="submit" value="로그인" class="btn">
                <button type="button" class="btn" onclick="location.href='./makeAccount.php'">회원가입</button>
            </div>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
</head>
<body>
    <div class="login-box">
        <h2>회원가입</h2>
        <form method="POST" action="./makeAccountReply.php">
            <div class="form-group">
                <input type="text" id="id" name="id" placeholder="아이디를 입력하세요" required>
            </div>
            <div class="form-group">
                <input type="password" id="pw" name="pw" placeholder="비밀번호를 입력하세요" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="이메일을 입력하세요" required>
            </div>
            <div class="button-group">
                <input type="submit" value="회원가입" class="btn">
                <button type="button" class="btn" onclick="location.href='./loginPage.php'">돌아가기</button>
            </div>
        </form>
    </div>
</body>
</html>

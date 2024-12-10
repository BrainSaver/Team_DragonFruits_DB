<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
</head>
<body>
    <div class="login-box">
        <h2>아이디 찾기</h2>
        <form method="POST" action="./findIDReply.php">
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="이메일을 입력하세요" required>
            </div>
            <div class="button-group">
                <input type="submit" value="찾기" class="btn">
                <button type="button" class="btn" onclick="location.href='./loginPage.php'">돌아가기</button>
            </div>
        </form>
    </div>
</body>
</html>

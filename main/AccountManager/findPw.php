<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <link rel="StyleSheet" href="./table.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <style>

    </style>
</head>
<body>
    <div class="login-box">
        <h2>아이디 찾기</h2>
        <form method="POST" action="./findPwReply.php">
            <div class="form-group">
                <label for="email">이메일:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <input type="submit" value="찾기">
        </form>
    </div>
</body>
</html>
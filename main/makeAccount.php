<?php 
    $conn = mysqli_connect('localhost', 'root', '***REMOVED***');
    mysqli_select_db($conn, 'db');
?>

<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        a {
            text-decoration: none;
            color: grey;
        }
        .login-box {
            border: 1px solid #000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin: 5px 0;
        }
        label {
            margin-right: 10px;
        }
        input[type="text"], input[type="password"] {
            flex: 1;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-color: grey;
        }
        input[type="submit"] {
            background-color: white;
            border-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>회원가입</h2>
        <form method="POST" action="./accountReply.php">
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
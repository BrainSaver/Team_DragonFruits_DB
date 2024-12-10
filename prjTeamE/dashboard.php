<?php 
if(!isset($_COOKIE['user'])) header("Location: ./index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./table.css" type="text/css" />
    <title>대시보드</title>

    </style>
</head>
<body>
    <header class="header" style="display: flex; align-items: center;">
        <div><h2>Dragon Fruits</h2></div>
        <div class="ex"><iframe src="./dashboard/realTime.php" style="width: 100%; height: 100%;"></iframe></div>
        <div><?php echo $_COOKIE['user']?>님 반갑습니다 <br> <button class="btn" onClick="location.href='deletecookie.php'">로그아웃</div>
    </header>
    <br><br><br><br>
    <main class="container">
        <div class="box">     
                <iframe src="./dashboard/googleMap.php" id="contentFrame"></iframe>
        </div>
        <div class="box">
            <iframe src="./dashboard/news.php" id="contentFrame"></iframe>
        </div>
        <div class="box">
                <iframe src="./dashboard/make_graph.php" id="contentFrame"></iframe>
        </div>
        <div class="box">
            <iframe src="./dashboard/circle.html" id="contentFrame"></iframe>
        </div>
        
        </div>
    </main>
</body>
</html>
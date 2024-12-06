<?php 
if(!isset($_COOKIE['user'])) header("Location: ./index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>대시보드</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header {
            width: 100%;
            height: 7%;
            position: fixed;
            display: flex;
            justify-content: space-around;
            background-color: grey;
            color: white;
            padding: 10px;
        }
        .header div {
            text-align: center;
            padding: 1px;
            border-radius: 5px;
            background-color: lightgrey;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 20px;
            margin-top: 60px; /* Adjusted to account for fixed header */
        }
        .box {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            background: #fafafa;
            height: 350px;
        }
        .map, .chart, .pie-charts {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            color: #666;
        }
        .chart {
            text-align: center;
        }
        .pie-charts {
            display: flex;
            justify-content: space-around;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }
            .box {
                height: auto;
            }
        }
    </style>
</head>
<body>
    <header class="header" style="display: flex; align-items: center;">
        <div><h2>Dragon Fruits</h2></div>
        <div><iframe src="./dashboard/realTime.php"></iframe></div>
        <div><?php echo $_COOKIE['user']?>님 반갑습니다 <br> <button class="navyBtn" onClick="location.href='deletecookie.php'">로그아웃</button></div>
    </header>
    <main class="container">
        <div class="box map">
            <iframe src="./dashboard/googleMap.php" id="contentFrame"></iframe>
        </div>
        <div class="box news">
            <iframe src="./dashboard/news.php" id="contentFrame"></iframe>
        </div>
        <div class="box chart">
            <iframe src="./database/make_graph.php" id="contentFrame"></iframe>
        </div>
        <div class="box pie-charts">
            <iframe src="./database/circle.html" style="width: 200%; height: 100%;"></iframe>
        </div>
    </main>
</body>
</html>

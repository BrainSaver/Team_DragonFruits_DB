<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>뉴스 기사 표시</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            
            background-color: #3a3b4f;
        }
        h1 {
            text-align: center;
            color:white
        }
        .news-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .news-item {
            background: linear-gradient(135deg, #1b1f3b, #121528);
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
        }
        .news-item h2 {
            font-size: 18px;
            color: white;
        }
        .news-item p {
            color: lightgrey;
        }
        .news-item a {
            display: block;
            text-align: center;
            padding: 10px;
            background-color: #3e4070;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .news-item a:hover {
        background-color: #88aaff;
        }
    </style>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "***REMOVED***";
    $dbname = "news";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch articles
    $sql = "SELECT title, description, url FROM article";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h1>뉴스 기사</h1>';
        echo '<div class="news-container">';
        while($row = $result->fetch_assoc()) {
            if($row['title']!= '[Removed]'){//삭제된 기사는 띄우지 않음
                echo '<div class="news-item">';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                echo '<a href="' . htmlspecialchars($row['url']) . '" target="_blank">더 보기</a>';
                echo '</div>';
            }
        }
        echo '</div>';
    } else {
        echo "No articles found.";
    }

    $conn->close();
    ?>
</body>
</html>

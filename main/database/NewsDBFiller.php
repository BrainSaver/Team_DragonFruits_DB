<?php
$apiKey = '***REMOVED***';
$url = "https://newsapi.org/v2/everything?q=oil%20OR%20gold%20OR%20gas%20OR%20aluminum%20OR%20copper&apiKey={$apiKey}";

// 뉴스 데이터를 가져오는 함수
function fetchNews($url) {
    $response = file_get_contents($url);
    if ($response === false) {
        // Handle the error appropriately
        return [];
    }
    return json_decode($response, true);
}

// DB 연결 설정
$servername = "localhost";
$username = "root";
$password = "***REMOVED***";
$dbname = "news";

// DB 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 뉴스 데이터 가져오기
$data = fetchNews($url);
$articles = $data['articles'];

// 뉴스 데이터를 DB에 저장
foreach ($articles as $article) {
    $title = $conn->real_escape_string($article['title']);
    $description = $conn->real_escape_string($article['description'] ? $article['description'] : '기사 내용이 없습니다.');
    $url = $conn->real_escape_string($article['url']);

    $sql = "INSERT INTO article (title, description, url) VALUES ('$title', '$description', '$url')";
    if ($conn->query($sql) === TRUE) {
        echo "뉴스 저장됨<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// DB 연결 종료
$conn->close();
?>
<?php
// FRED API 설정
$apiKey = '***REMOVED***';
$baseUrl = 'https://api.stlouisfed.org/fred/series/observations';

// 상품별 FRED Series ID
$commodities = [
    'Gold' => 'GOLDPMGBD228NLBM',         // 금
    'Silver' => 'SLVPRUSD',               // 은
    'Copper' => 'PCOPPUSDM',              // 구리
    'Aluminum' => 'PALUMUSDM',            // 알루미늄
    'Crude Oil' => 'DCOILWTICO',          // 국제유가
];

// MySQL 연결 정보
$host = 'localhost';
$db = 'commodities_data';
$user = 'root';
$pass = 'password'; // 자신의 DB 비밀번호 입력
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "Database connected successfully\n";
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// 데이터 가져오기 및 저장
foreach ($commodities as $commodity => $seriesId) {
    $url = "$baseUrl?series_id=$seriesId&api_key=$apiKey&file_type=json";

    echo "Fetching data for $commodity...\n";
    $response = file_get_contents($url);

    if ($response === false) {
        echo "Failed to fetch data for $commodity\n";
        continue;
    }

    $data = json_decode($response, true);

    if (isset($data['observations'])) {
        foreach ($data['observations'] as $observation) {
            $date = $observation['date'];
            $price = $observation['value'];

            // 데이터베이스에 저장
            $stmt = $pdo->prepare("
                INSERT IGNORE INTO commodity_prices (commodity, date, price) 
                VALUES (:commodity, :date, :price)
            ");
            $stmt->execute([
                ':commodity' => $commodity,
                ':date' => $date,
                ':price' => $price,
            ]);
        }
        echo "Data for $commodity successfully inserted.\n";
    } else {
        echo "No data found for $commodity\n";
    }
}
?>

<?php
// FRED API 설정
$apiKey = '***REMOVED***';
$baseUrl = 'https://api.stlouisfed.org/fred/series/observations';

// 상품별 FRED Series ID
$commodities = [
    'Gold' => 'IQ12260',         // 금
    'CNG' => 'DHHNGSP',               // 가스
    'Copper' => 'PCOPPUSDM',              // 구리
    'Aluminum' => 'PALUMUSDM',            // 알루미늄
    'Crude Oil' => 'DCOILWTICO',          // 국제유가
];

$host = 'localhost';
$db = 'commodities_data';
$user = 'root';
$pass = '***REMOVED***';

$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
mysqli_select_db($conn, $db);

foreach ($commodities as $commodity => $seriesId) {
    $url = "$baseUrl?series_id=$seriesId&api_key=$apiKey&file_type=json";
    $response = @file_get_contents($url);
    $data = json_decode($response, true);

    if (isset($data['observations'])) {
        foreach ($data['observations'] as $observation) {
            $date = $observation['date'];
            $price = $observation['value'];
            $sql = "
                INSERT IGNORE INTO commodity_prices (commodity, date, price) VALUES ('$commodity', '$date', '$price')
            ";
            mysqli_query($conn, $sql);
        }
        echo "Data for $commodity successfully inserted.\n";
    } else {
        echo "No data found for $commodity\n";
    }
}
mysqli_close($conn);
?>


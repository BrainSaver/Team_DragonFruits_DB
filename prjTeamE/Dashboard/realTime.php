<?php
require_once __DIR__ . '/../config.php';
$commodities = [
    'aluminum_prices' => '금(GLD)',         // 금
    'cng_prices' => '천연가스(UNG)',          // 가스
    'copper_prices' => '구리(CPER)',     // 구리
    'crude_oil_prices' => '알루미늄(CENX)',   // 알루미늄
    'gold_prices' => '국제유가(USO)', // 국제유가
];

    // 데이터베이스 연결 설정
    $host = env('DB_HOST');
    $db = 'commodities_data_real_time';
    $user = env('DB_USER');
    $pass = env('DB_PASS');

// 데이터베이스 연결
$conn = mysqli_connect($host, $user, $pass); // MySQL 연결
mysqli_select_db($conn, $db); // 데이터베이스 선택
echo '<table class="';
echo 'ext">';
foreach ($commodities as $commodity => $label) {
    $sql = "SELECT * FROM `$commodity` WHERE id = (SELECT MAX(id) FROM `$commodity`);";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo "<td>" . "$label: " . $row['price'] . "$</td>";
}
mysqli_close($conn);
echo "</tr></table>";
?>
<style>
table {
    table-layout: fixed;
}
.ext{
    width: 100%;
    height: 34px;
    color: white;
    background-color: transparent;
    border-radius: 12px;
}
td {
    border: 1px solid #3e4070;
    text-align: center;
    border-collapse: collapse;
    border-radius: 12px;
    background: linear-gradient(135deg, #1b1f3b, #121528);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}
</style>
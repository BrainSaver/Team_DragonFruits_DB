<?php
$commodities = [
    'aluminium_prices',    // 금
    'cng_prices',          // 가스
    'copper_prices',       // 구리
    'crude_oil_prices',    // 알루미늄
    'gold_prices',         // 국제유가
];

// 데이터베이스 연결 설정
$host = 'localhost';
$db = 'commodities_data_real_time';
$user = 'root';
$pass = '***REMOVED***';

// 데이터베이스 연결
$conn = mysqli_connect($host, $user, $pass); // MySQL 연결
mysqli_select_db($conn, $db); // 데이터베이스 선택

foreach ($commodities as $commodity) {
    $sql = "SELECT * FROM `$commodity` WHERE id = (SELECT MAX(id) FROM `$commodity`);";
    echo "$sql\n";
    //mysqli_query($conn, $sql);
    //$row = mysqli_fetch_assoc($result);
    //echo $row['price'];
}
mysqli_close($conn);
?>

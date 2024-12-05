<?php
$commodities = [
    'aluminium_prices',    // 알루미늄
    'cng_prices',          // 가스
    'copper_prices',       // 구리
    'crude_oil_prices',    // 원유
    'gold_prices',         // 금
];

// 데이터베이스 연결 설정
$host = 'localhost';
$db = 'commodities_data_real_time';
$user = 'root';
$pass = '***REMOVED***';

// 데이터베이스 연결
$conn = mysqli_connect($host, $user, $pass); // MySQL 연결
if (!$conn) {
    die("데이터베이스 연결 실패: " . mysqli_connect_error());
}
mysqli_select_db($conn, $db); // 데이터베이스 선택

foreach ($commodities as $commodity) {
    // 쿼리 실행
    $sql = "SELECT * FROM `$commodity` WHERE id = (SELECT MAX(id) FROM `$commodity`)";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "쿼리 실패 (테이블: $commodity): " . mysqli_error($conn) . "\n";
        continue;
    }

    // 결과 처리
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "테이블 '$commodity'의 최신 데이터:\n";
        foreach ($row as $key => $value) {
            echo "$key: $value\n";
        }
        echo "\n";
    } else {
        echo "테이블 '$commodity'에 데이터가 없습니다.\n";
    }
}

// 데이터베이스 연결 종료
mysqli_close($conn);
?>

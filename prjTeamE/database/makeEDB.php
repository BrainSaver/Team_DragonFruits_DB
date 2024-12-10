<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');

// Create database
$sql = "create database commodities_data";
mysqli_query($conn, $sql);

// Select database
mysqli_select_db($conn, 'commodities_data');

// 테이블 이름과 관련된 정보를 배열로 정의
$tables = [
    'gold_prices' => 'Gold',
    'copper_prices' => 'Copper',
    'aluminum_prices' => 'Aluminum',
    'cng_prices' => 'CNG',
    'crude_oil_prices' => 'Crude Oil',
];

// 반복문을 사용하여 테이블 생성
foreach ($tables as $tableName => $commodity) {
    $sql = "
        CREATE TABLE IF NOT EXISTS $tableName (
            id INT AUTO_INCREMENT PRIMARY KEY,
            commodity VARCHAR(50) NOT NULL,
            date DATE NOT NULL,
            price FLOAT NOT NULL,
            UNIQUE(commodity, date)
        )
    ";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>

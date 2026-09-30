<?php
require_once __DIR__ . '/../config.php';
$conn = mysqli_connect(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS commodities_data_real_time";
mysqli_query($conn, $sql);

// Select database
mysqli_select_db($conn, 'commodities_data_real_time');

$tables = [
    'gold_prices' => 'Gold',
    'copper_prices' => 'Copper',
    'aluminum_prices' => 'Aluminum',
    'cng_prices' => 'CNG',
    'crude_oil_prices' => 'Crude Oil',
];

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
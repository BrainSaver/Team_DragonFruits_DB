<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');

// Create database
$sql = "create database commodities_data";
if (mysqli_query($conn, $sql)) {
    echo "Database commodities_data created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

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
    if (mysqli_query($conn, $sql)) {
        echo "Table $tableName created successfully<br>";
    } else {
        echo "Error creating table $tableName: " . mysqli_error($conn) . "<br>";
    }
}

mysqli_close($conn);
?>

<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
$sql = "CREATE DATABASE IF NOT EXISTS df";
if (mysqli_query($conn, $sql)) {
    echo "Database df created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}
?>

<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
mysqli_select_db($conn, 'df');

$sql = "create table userdata (id varchar(20) not null, pw varchar(512) not null, email varchar(256) not null, primary key(id)) DEFAULT CHARSET=utf8;";
if (mysqli_query($conn, $sql)) {
    echo "Table userdata created successfully<br>";
} else {
    echo "Error creating table userdata: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
?>

<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS commodities_data_real_time";
if (mysqli_query($conn, $sql)) {
    echo "Database commodities_data_real_time created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

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
    if (mysqli_query($conn, $sql)) {
        echo "Table $tableName created successfully<br>";
    } else {
        echo "Error creating table $tableName: " . mysqli_error($conn) . "<br>";
    }
}

mysqli_close($conn);
?>

<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
$sql = "CREATE DATABASE IF NOT EXISTS news";
if (mysqli_query($conn, $sql)) {
    echo "Database news created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}
?>

<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
mysqli_select_db($conn, 'news');

$sql = "create table article (title varchar(512) not null, description varchar(512) not null, url varchar(256) not null)";
if (mysqli_query($conn, $sql)) {
    echo "Table article created successfully<br>";
} else {
    echo "Error creating table article: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);
?>

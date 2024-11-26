<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
$sql = "CREATE DATABASE commodities_data;
USE commodities_data;

CREATE TABLE commodity_prices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commodity VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    price FLOAT NOT NULL,
    UNIQUE(commodity, date)
);"
mysqli_query($conn, $sql);
?>
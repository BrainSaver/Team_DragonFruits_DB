<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');


// Create database
$sql = "CREATE DATABASE IF NOT EXISTS commodities_data";
mysqli_query($conn, $sql);

// Select database
mysqli_select_db($conn, 'commodities_data');

// Create table
$sql = "CREATE TABLE IF NOT EXISTS gold_prices (
id INT AUTO_INCREMENT PRIMARY KEY,
commodity VARCHAR(50) NOT NULL,
date DATE NOT NULL,
price FLOAT NOT NULL,
UNIQUE(commodity, date)
)";
mysqli_query($conn, $sql);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS copper_prices (
id INT AUTO_INCREMENT PRIMARY KEY,
commodity VARCHAR(50) NOT NULL,
date DATE NOT NULL,
price FLOAT NOT NULL,
UNIQUE(commodity, date)
)";
mysqli_query($conn, $sql);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS aluminum_prices (
id INT AUTO_INCREMENT PRIMARY KEY,
commodity VARCHAR(50) NOT NULL,
date DATE NOT NULL,
price FLOAT NOT NULL,
UNIQUE(commodity, date)
)";
mysqli_query($conn, $sql);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS cng_prices (
id INT AUTO_INCREMENT PRIMARY KEY,
commodity VARCHAR(50) NOT NULL,
date DATE NOT NULL,
price FLOAT NOT NULL,
UNIQUE(commodity, date)
)";
mysqli_query($conn, $sql);

// Create table
$sql = "CREATE TABLE IF NOT EXISTS crude_oil_prices (
id INT AUTO_INCREMENT PRIMARY KEY,
commodity VARCHAR(50) NOT NULL,
date DATE NOT NULL,
price FLOAT NOT NULL,
UNIQUE(commodity, date)
)";
mysqli_query($conn, $sql);



mysqli_close($conn);
?>
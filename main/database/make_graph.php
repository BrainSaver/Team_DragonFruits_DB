<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
if (!$conn) die('Could not connect: ' . mysqli_error($conn));
if (!mysqli_select_db($conn, 'commodities_data')) die("Can't use commodities_data: " . mysqli_error($conn));

// 테이블 목록을 자동으로 가져오기
$sql = "SHOW TABLES";
$result = mysqli_query($conn, $sql);

if ($result) {
    // 결과를 배열로 저장
    $tables = [];
    while ($row = mysqli_fetch_array($result)) {
        $tables[] = $row[0]; // 첫 번째 컬럼에 테이블 이름이 있음
    }

    // 테이블 목록 출력
    foreach ($tables as $table) {
        echo "<h3>$table 의 데이터</h3>";
        
        // 테이블마다 데이터를 조회
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // 각 행을 반복하면서 출력
            while ($row = mysqli_fetch_array($result)) {
                echo "ID: " . $row['id'] . " ";
                echo "Commodity: " . $row['commodity'] . " ";
                echo "Date: " . $row['date'] . " ";
                echo "Price: " . $row['price'] . "<br/>";
            }
        } else {
            echo "Error fetching data from $table: " . mysqli_error($conn) . "<br/>";
        }
    }
} else {
    echo "Error retrieving table names: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

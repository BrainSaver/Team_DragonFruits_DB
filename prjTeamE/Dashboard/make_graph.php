<?php
require_once __DIR__ . '/../config.php';
// 데이터베이스에 연결
$conn = mysqli_connect(env('DB_HOST'), env('DB_USER'), env('DB_PASS'));
if (!$conn) die('DB 연결 실패: ' . mysqli_error($conn));
if (!mysqli_select_db($conn, 'commodities_data')) die("DB 선택 실패: " . mysqli_error($conn));

// 상품 목록
$commodities = ['gold', 'copper', 'aluminum', 'cng', 'crude_oil'];

// 각 상품 데이터 가져오기
$commodityData = [];
foreach ($commodities as $commodity) {
  $sql = "SELECT date, price FROM {$commodity}_prices ORDER BY date";
  $result = mysqli_query($conn, $sql);
  $commodityData[$commodity] = [];
  $previousPrice = null; // 이전 값을 저장할 변수
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $price = (float)$row['price'];
      if ($price == 0 || $price == null) { // 가격이 0원 또는 null인 경우
        $price = $previousPrice; // 이전 값을 사용
      } else {
        $previousPrice = $price; // 현재 값을 이전 값으로 저장
      }
      $commodityData[$commodity][$row['date']] = $price;
    }
  }
}
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
  <style>
    ::-webkit-scrollbar {
      width: 12px;
    }

    ::-webkit-scrollbar-track {
      background: #3A3B4F;
    }

    ::-webkit-scrollbar-thumb {
      background-color: #FFFFFF;
      border-radius: 10px;
      border: 3px solid #3A3B4F;
    }
  </style>
  
  <meta charset="utf-8">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      var allData = <?php echo json_encode($commodityData); ?>;
      var commodities = <?php echo json_encode($commodities); ?>;

      //날짜, 가격
      commodities.forEach(function (commodity) {
        var chartData = [['Date', 'Price']];
        for (var date in allData[commodity]) {
          chartData.push([date, allData[commodity][date]]);
        }
        
        var data = google.visualization.arrayToDataTable(chartData);

        var options = {
          title: commodity + "의 가격 변화",
          titleTextStyle: {color: '#FFFFFF'},
          hAxis: {title: 'Date', textStyle: {color: '#FFFFFF'}, titleTextStyle: {color: '#FFFFFF'}},
            vAxis: {title: 'Price', textStyle: {color: '#FFFFFF'}, titleTextStyle: {color: '#FFFFFF'}, minValue: 0},
          legend: {position: 'bottom', textStyle: {color: '#FFFFFF'}},
          backgroundColor: '#3A3B4F',
          colors: ['#FFFFFF'],
        };

        var chartDiv = document.getElementById('chart_' + commodity);
        var chart = new google.visualization.LineChart(chartDiv);
        chart.draw(data, options);
      });
    }
  </script>
</head>
<body>
  <?php foreach ($commodities as $commodity): ?>
    <div id="chart_<?php echo $commodity; ?>" style="width: 100%; height: 500px; margin-bottom: 20px;"></div>
  <?php endforeach; ?>
</body>
</html>

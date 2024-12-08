<?php
// 데이터베이스에 연결
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
if (!$conn) die('연결할 수 없습니다: ' . mysqli_error($conn));

// 'commodities_data' 데이터베이스 선택
if (!mysqli_select_db($conn, 'commodities_data')) die("commodities_data를 사용할 수 없습니다: " . mysqli_error($conn));

// 상품 목록 정의
$commodities = ['gold', 'copper', 'aluminum', 'cng', 'crude_oil'];
$data = [['Date']];

// 데이터 헤더 초기화
foreach ($commodities as $commodity) {
  $data[0][] = strtoupper($commodity);
}

// 각 상품에 대한 데이터 가져오기
$commodityData = [];
foreach ($commodities as $commodity) {
  $sql = "SELECT date, price FROM {$commodity}_prices";
  $result = mysqli_query($conn, $sql);
  $commodityData[$commodity] = [];
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {//배열로 저장
      $commodityData[$commodity][$row['date']] = (float)$row['price'];
    }
  }
}

// 모든 날짜 병합
$allDates = [];
foreach ($commodityData as $dataPerCommodity) {
  $allDates = array_merge($allDates, array_keys($dataPerCommodity));//합치기
}
$allDates = array_unique($allDates);// 중복되는 데이터 지우기
sort($allDates);//여기도 소팅이 있다고!!!!!

// 데이터 채우기
foreach ($allDates as $date) {
  $row = [$date];
  foreach ($commodities as $commodity) {
    $row[] = isset($commodityData[$commodity][$date]) ? $commodityData[$commodity][$date] : null;
  }
  $data[] = $row;
}
// 없는 값을 이전 값으로 채우기
foreach ($commodities as $index => $commodity) {
  $previous = null;
  for ($i = 1; $i < count($data); $i++) {
    if ($data[$i][$index + 1] !== null) {
      $previous = $data[$i][$index + 1];
    } else {
      $data[$i][$index + 1] = $previous;
    }
  }
}

// 데이터베이스 연결 종료
mysqli_close($conn);
?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>
  <head>
    <!-- 구글 차트 로드 -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        // PHP에서 생성된 데이터를 JSON 형식으로 변환
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);

        // 차트 옵션
        var options = {
          title: '자원의 가격 변동 추이',
          
          hAxis: {title: 'Date', titleTextStyle: {color: '#333'}},
          vAxis: {
            title: 'Price',
            minValue: 0,
            interpolateNulls: true//끊어진 부분 부드럽게 연결~ 근데 잘 작동 되는진 모르겠음-길 
            },
          curveType: 'function',
          legend: { position: 'bottom' },
          height: 330,
          vAxis: { viewWindow: { max: 12000, min: 0 } }
        };

        // 영역 차트 생성 및 그리기
        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 100%;"></div>
  </body>
</html>

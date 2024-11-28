<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***');
if (!$conn) die('Could not connect: '. mysqli_error($conn));
if (!mysqli_select_db($conn, 'commodities_data')) die ('Can\'t use foo : '. mysqli_error($conn));

$sql = "select * from commodity_prices";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)) {
echo $row['id'] . " ";
echo $row['commodity'] . " ";
echo $row['date'] . " ";
echo $row['price'] . "<br/>";
}

mysqli_close($conn);
?>
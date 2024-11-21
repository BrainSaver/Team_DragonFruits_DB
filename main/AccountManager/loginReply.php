<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');

$id = isset($_POST['id']) ? $_POST['id'] : '';
$pw = isset($_POST['pw']) ? $_POST['pw'] : '';
$sql = "SELECT * FROM userdata WHERE id = ".$id." AND pw = sha2(".$pw.", 256)";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row != NULL) {
    echo "yes";
}
else echo "no";
mysqli_close($conn); 
?>
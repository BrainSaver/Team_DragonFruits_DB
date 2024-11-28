<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');

$id = isset($_POST['email']) ? $_POST['email'] : '';;
$sql = "SELECT * FROM userdata WHERE email = ".$email;
$result = mysqli_query($conn, $sql);
echo $result;
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row != NULL) {
    echo "yes";
}
else echo "no";
mysqli_close($conn); 
?>
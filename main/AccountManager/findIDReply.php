<?php
var_dump($_POST);
echo $_POST['id'];
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');
$email = isset($_POST['email']) ? $_POST['email'] : '';
$email = mysqli_real_escape_string($conn, $email);
$sql = "SELECT * FROM userdata WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo "Error executing query: " . mysqli_error($conn);
    exit;
}
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($row) {
    echo $row['id'];
} else {
    echo "no";
}
mysqli_close($conn); 
?>

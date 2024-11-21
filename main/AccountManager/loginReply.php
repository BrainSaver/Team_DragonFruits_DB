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

/*이거 ID에 영어 알파벳 들어가면 로그인 오류남. 이유는 모르겠음. -길동현 */
?>
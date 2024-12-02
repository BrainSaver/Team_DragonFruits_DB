<?php
$conn = mysqli_connect('localhost', 'root', '***REMOVED***'); 
mysqli_select_db($conn, 'df');

$id = isset($_POST['id']) ? $_POST['id'] : '';
$pw = isset($_POST['pw']) ? $_POST['pw'] : '';
$id = mysqli_real_escape_string($conn, $id);
$pw = mysqli_real_escape_string($conn, $pw);
$sql = "SELECT * FROM userdata WHERE id = '".$id."' AND pw = sha2(sha2(".$pw.", 256),256)";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row != NULL) {
    //$_cookie_name = "user";
    //$user_id = "$id";
    //setcookie($cookie_name, $cookie_value, time() + (3600), "/"); // 86400 = 1 day
    include("../dashboard.html");
}
else include("./accessDenied.html");
mysqli_close($conn); 

/*이거 ID에 영어 알파벳 들어가면 로그인 오류남. 이유는 모르겠음. -길동현 */
/*고침 -이재훈 */
/*믿고있었다구 젠장~!!!!-김동현*/ 
?>
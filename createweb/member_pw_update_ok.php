<meta charset="utf-8" />
<?php
session_start();
$username = $_SESSION['username'];
$conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

$password = MD5($_POST['password'], PASSWORD_DEFAULT);

$sql = mq("update users set password='[$password]' where username = '[$username]'");
session_destroy();
echo "<script>alert('비밀번호를 변경했습니다.'); location.href='index.php';</script>";

?>

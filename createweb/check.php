<?php
  $conn = mysqli_connect("localhost", "root", "p97j01w20*", "login", 3306);
	$uid = $_GET["username"];
  $select_query = "SELECT * FROM users WHERE username ='{$uid}'";
	$result =mysqli_query($conn, $select_query);
	$member = mysqli_fetch_array($result);
	if($member==0)
	{
?>
	<div style='font-family:"malgun gothic"';><?php echo $uid; ?>은(는) 사용가능한 아이디입니다.</div>
  <button value="사용" onclick="window.close()">사용</button>
<?php
	}else{
?>
	<div style='font-family:"malgun gothic"; color:red;'><?php echo $uid; ?>은(는) 이미 사용중인 아이디입니다.</div>
    <button value="닫기" onclick="window.close()">닫기</button>
<?php
	}
?>

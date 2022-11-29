<?php
	include $_SERVER['DOCUMENT_ROOT']."/pajji/userboard/db.php";

	$bno = $_GET['idx'];
	$sql = mq("delete from board where idx='$bno';");
	echo "<script>alert('삭제되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=/pajji/userboard/index.php" />

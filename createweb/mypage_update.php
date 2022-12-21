<?php
  $cur_pw = $_POST['current_pw'];
  session_start();
  $conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

  $username = $_SESSION['username'];
  $sql = "select * from users where username='$username' and password = MD5('$cur_pw');";

  if($result = mysqli_fetch_array(mysqli_query($conn, $sql))){
    echo "<script>alert('비밀번호 변경이 완료되었습니다.')</script>";
    echo "<script>location.href='mypage.php'</script>";
  } else{
    echo "<script>alert('기존 비밀번호가 일치하지 않습니다.')</script>";
    echo "<script>location.href='mypage.php'</script>";
  }
?>

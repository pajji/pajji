<!-- 원래 메소드 post-->
<?php
  session_start();
  $username = $_SESSION['username'];
  $conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

  $cur_pw = $_POST['password'];
  $new_pw = $_POST['new_pw'];
  $new_pw_re = $_POST['new_pw_re'];
  $show_pw = "select password from users where username='[$username]'";

  if($new_pw == $new_pw_re){
    echo"<script>alert('수정할 비밀번호가 일치합니다.')</script>";
    $change_pw_sql = "update users set password = MD5('$new_pw') where username = '[$username]'";
  }else{
    echo"<script>alert('수정할 비밀번호가 일치하지 않습니다.')</script>";
  }
  if($cur_pw == $show_pw){
  echo "<script>alert('기존 비밀번호가 일치합니다.')</script>";
}else{
  echo "<script>alert('기존 비밀번호가 일치하지 않습니다.')</script>";
}

  echo "<script>alert('비밀번호 변경이 완료되었습니다.')</script>";
  echo "<script>location.href='mypage2.php'</script>";
?>

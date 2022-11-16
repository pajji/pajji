<?php
  require_once('lib/top.php');
  session_start();
  $username = $_SESSION['username'];

  $conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);
  $sql = "SELECT * FROM users where username='$username'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
?>

<form method="post" action="mypage_update.php"
  <div class="w-50 ml-auto mr-auto mt-5">
    <?php echo "<h2>$username 의 마이페이지</h2>"?>
      <div class="mb-3 ">
          <input name="username" type="text" class="form-control"  placeholder="<?=$username?>">
      </div>
      <div class="mb-3 ">
          <input name="password" type="password" class="form-control" placeholder="수정할 비밀번호">
          <input name="current_pw" id="current_pw" type="hidden">
      </div>
      <div class="mb-3 ">
          <input type="submit" value="수정" onclick="document.getElementById('current_pw') .value=prompt('현재 비밀번호를 입력해주세요.', '현재 비밀번호')">
      </div>
    </div>
</form>

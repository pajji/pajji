<?php
  $conn = mysqli_connect("localhost", "root", "p97j01w20*", "login", 3306);

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users where username = '$username';";
  $result = mysqli_fetch_array(mysqli_query($conn, $sql));

    if($result['password'] == $password){
      session_start();
      $_SESSION['username'];
      print_r($_SESSION);
      echo $_SESSION['username'];
  ?>
      <script>
          alert("로그인에 성공하였습니다.")
          location.href = "index.php";
      </script>
  <?php
  } else {
  ?>
      <script>
          alert("아이디 또는 비밀번호를 확인해주시기 바랍니다.");
          location.href = "login2.php";
      </script>
  <?php
  }
  ?>
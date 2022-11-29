<?php
  $conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users where username = '$username' and
  password = '$password';";
    if($result = mysqli_fetch_array(mysqli_query($conn, $sql))){
        session_start();
        $_SESSION['userId'] = $row['username'];
        print_r($_SESSION);
        echo $_SESSION['userId'];
?>
        <script>
          alert("로그인에 성공하였습니다.")
          location.href = "index.php";
        </script>
<?php
    } else {
?>
    <script>
      alert("아이디 또는 비밀번호를 확인해주시기 바랍니다.")
      location.href = "login5.php";
    </script>
<?php
      }
?>

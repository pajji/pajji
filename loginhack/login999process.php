<?php
$conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];

$sql = "SELECT * FROM users where username='$user_id'";
$result = mysqli_fetch_array(mysqli_query($conn,$sql));

  if($result['password'] === MD5($user_pw)){
    session_start();
    $_SESSION['user_id'] = $row['user_id'];
    print_r($_SESSION);
    echo $_SESSION['user_id'];
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
        location.href = "login999.php";
    </script>
<?php
}
?>

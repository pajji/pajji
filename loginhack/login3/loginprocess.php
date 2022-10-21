<?php
$conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username ='{$username}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$hashedPassword = $row['password'];
$row['id'];

foreach($row as $key => $r){
    echo "{$key} : {$r} <br>";
}

$passwordResult = password_verify($password, $hashedPassword);
if ($passwordResult === true) {
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
        alert("아이디 또는 비밀번호를 확인해주시기 바랍니다.");
    </script>
<?php
}
?>

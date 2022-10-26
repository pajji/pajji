<?php
$conn = mysqli_connect("localhost","root","p97j01w20*","login",3306);
$hashedPassword = MD5($_POST['password']);
echo $hashedPassword;
$sql = "INSERT INTO users (username, password, created)
VALUES('{$_POST['username']}', '{$hashedPassword}', NOW())";
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "회원가입에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo (mysqli_error($conn));
} else {
?>
    <script>
        alert("회원가입이 완료되었습니다");
        location.href = "login.php";
    </script>
<?php
}
?>

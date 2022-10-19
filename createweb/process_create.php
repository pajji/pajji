<?php
$conn = mysqli_connect("127.0.0.1","root","p97j01w20*","login",3306);
$sql = "
INSERT INTO user
    (username, password, created)
VALUES(
    '{$_POST['username']}',
    '{$_POST['password']}',
    NOW()
    )
    ";
    $result = mysqli_query($conn, $sql);
    echo $result;

    if($result == false){
        echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
        error_log(mysqli_error($conn));
    }else{
        echo "가입이 완료되었습니다.<a href='index.php'>돌아가기</a>";
    }
?>

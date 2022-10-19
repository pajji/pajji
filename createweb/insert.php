<?php
// $mysqli = mysqli_connect("example.com", "user", "password", "database");
// $res = mysqli_query($mysqli, "SELECT 'Please, do not use ' AS _msg FROM DUAL");
// $row = mysqli_fetch_assoc($res);
// echo $row['_msg'];
$conn = mysqli_connect("127.0.0.1","root","p97j01w20*","login",3306);
$sql = "
INSERT INTO user
    (username, password, created)
    VALUES(
        'MYSQL','1111',NOW()
        )
";

$result = mysqli_query($conn, $sql);

if($result === false){
    echo mysqli_error($conn);
}

?>

<!-- checkId_ok.php -->
<?php
    include './lib/include/sql_conn.php';

    $username = $_GET['username'];
    $sql = "select id from login where username='$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($result);

    echo isset($data['id']) ? "X" : "O";
?>

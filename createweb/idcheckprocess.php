<?php
$conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);

$username = $_POST['username'];
$sql = "SELECT * FROM users WHERE username ='{$username}'";

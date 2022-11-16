<?php
  require_once('lib/top.php');
  session_start();
  $username = $_SESSION['username'];

  $conn = mysqli_connect("127.0.0.1", "root", "p97j01w20*", "login", 3306);
  $sql = "SELECT * FROM users where username='$username'";
  $row = mysqli_fetch_array(mysqli_query($conn, $sql));
?>

<input name = "username" type="text" placeholder="<?=$username?>"/>

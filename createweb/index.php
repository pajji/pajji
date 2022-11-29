<?php
session_start();
require_once('lib/top.php');
?>
</head>
<body>
<style>
  ul {text-align: center;}
  li {margin: 20px 10px;}
</style>
    <ul>
        <?php
          if (isset($_SESSION['username'])) {
              echo "{$_SESSION['username']}님 환영합니다.";
        ?>
        <br/><br/>
          <a href="mypage.php">마이페이지<br/>
          <a href="/pajji/board/index.php">회원게시판<br/>
          <a href="logoutprocess.php">로그아웃<br/>
          <a href=".php">회원탈퇴<br/>
        <?php
          } else {
        ?>
        <a href="login.php">로그인<br/>
        <a href="signup.php">회원가입<br/>
        <a href="/pajji/board/index.php">회원게시판<br/>
        <a href="/pajji/free_board/index.php">문의게시판<br/>
        <?php
        }
        ?>
    </ul>
</body>
</html>

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
        ?><br/>
          <a href="logoutprocess.php">로그아웃<br/>
          <a href="editinfo.php">회원정보수정<br/>
          <a href=".php">회원탈퇴<br/>
        <?php
        } else {
        ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="signup.php">회원가입 </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">로그인</a>
            </li>
        <?php
        }
        ?>
    </ul>
</body>
</html>

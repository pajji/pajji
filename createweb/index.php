<?php
session_start();
require_once('lib/top.php');
?>
<div align="center";>
  <h2>박지완의 웹 브라우저 입니다.</h2></br>
</div>
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
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='mypage.php'">마이페이지</button><br/>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='/pajji/userboard/index.php'">회원게시판</button><br/>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='/pajji/freeboard/index.php'">문의게시판</button><br/>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='logoutprocess.php'">로그아웃</button><br/>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='.php'">회원탈퇴</button>
        <?php
          } else {
        ?>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='login.php'">로그인</button><br/>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='signup.php'">회원가입</button><br/>
        <button type="button" class="btn btn-primary mb-3" onClick="location.href='/pajji/freeboard/index.php'">문의게시판</button>
        <?php
        }
        ?>
    </ul>
</body>
</html>

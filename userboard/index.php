<?php require_once('lib/top.php'); ?>
<a href="/pajji/createweb/index.php"><img src="/pajji/createweb/home.png" alt="홈"></a>
<body>
  <div align="right";>
  <?php
  if (isset($_SESSION['username'])) {
      echo "{$_SESSION['username']}님 환영합니다.";
  ?>
  <?php
    } else {
  ?>
  <script>
    alert("로그인 후 이용바랍니다.")
    location.href = "/pajji/createweb/login.php";
  </script>
  <?php
    }
  ?>
</div>
  <div id="board_area">
    <h1><a href="/pajji/userboard/index.php">회원게시판</a></h1>
    <h4>회원전용 게시판입니다.</h4>
      <table class="list-table">
        <?php require_once('lib/set_columns1.php'); ?>
        <?php require_once('lib/set_columns2.php');
              require_once('lib/main.php'); ?>
        <?php require_once('lib/page_num.php'); ?>

    <div id="write_btn">
      <a href="/pajji/userboard/write.php"><button>글쓰기</button></a>
    </div>

    <?php require_once('lib/search.php'); ?>
</body>
</html>

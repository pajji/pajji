<?php require_once('lib/top.php'); ?>
<a href="/pajji/createweb/index.php"><img src="/pajji/createweb/home.png" alt="홈"></a>

<body>
  <div id="board_area">
    <?php
    if (isset($_SESSION['username'])) {
        echo "{$_SESSION['username']}님 환영합니다.";
    ?>
      <a href="/pajji/createweb/mypage.php">마이페이지
      <a href="/pajji/createweb/logoutprocess.php">로그아웃
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
    <h1><a href="/pajji/board/index.php">자유게시판</a></h1>
    <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
      <table class="list-table">
        <?php require_once('lib/set_columns1.php'); ?>
        <?php require_once('lib/set_columns2.php');
              require_once('lib/main.php'); ?>
        <?php require_once('lib/page_num.php'); ?>

    <div id="write_btn">
      <a href="/pajji/board/write.php"><button>글쓰기</button></a>
    </div>

    <?php require_once('lib/search.php'); ?>
</body>
</html>

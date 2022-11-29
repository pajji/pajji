<?php require_once('lib/top.php'); ?>
<a href="/pajji/createweb/index.php"><img src="/pajji/createweb/home.png" alt="홈"></a>
<body>
  <div id="board_area">
    <h1><a href="/pajji/freeboard/index.php">문의게시판</a></h1>
    <h4>비회원도 자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
      <table class="list-table">
        <?php require_once('lib/set_columns1.php'); ?>
        <?php require_once('lib/set_columns2.php');
              require_once('lib/main.php'); ?>
        <?php require_once('lib/page_num.php'); ?>

    <div id="write_btn">
      <a href="/pajji/freeboard/write.php"><button>글쓰기</button></a>
    </div>

    <?php require_once('lib/search.php'); ?>
</body>
</html>

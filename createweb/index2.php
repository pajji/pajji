<?php include  $_SERVER['DOCUMENT_ROOT']."/pajji/createweb/db.php"; ?>
<!-- db.php에서 sql 접속 및 정보를 가져온다 -->
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="/pajji/createweb/css/style.css" />
<h1><a href="index2.php">홈으로</a></h1>
</head>
<body>
<div id="board_area">
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
            </tr>
        </thead>
        <?php
        // board테이블에서 idx를 기준으로 내림차순해서 5개까지 표시
          $sql = mq("select * from board order by idx desc limit 0,5");
            while($board = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$board["title"];
              if(strlen($title)>30)
              {
                //title이 30을 넘어서면 ...표시
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
        ?>
        <tbody>
            <tr>
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="500"><?php
                $lockimg = "<img src='/pajji/createweb//img/lock.png' alt='lock' title='lock' with='20' height='20' />";
                if($board['lock_post']=="1")
                  { ?>
                    <a href='/pajji/createweb/ck_read.php?idx=<?php echo $board["idx"];?>'>
                      <?php echo $title, $lockimg;
                    }else{
                      ?>
<!-- 게시물 읽기, 경로, idx는 게시물 번호 -->
                <a href='/pajji/createweb/read.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?></a></td>
              <td width="120"><?php echo $board['name']?></td>
              <td width="100"><?php echo $board['date']?></td>
            </tr>
          </tbody>
        <?php
        }
        ?>
    </table>
<!-- 글쓰기 버튼 -->
    <div id="write_btn">
      <a href="/pajji/createweb/write.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>

<?php require_once('lib/top2.php'); ?>
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
  <!-- 게시물 검색 -->
  <div id="search_box">
    <form action="/pajji/createweb/search_result.php" method="get">
      <select name="catgo">
        <option value="제목">제목</option>
        <option value="작성자">작성자</option>
        <option value="내용">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" /> <button>검색</button>
    </form>
    </div>
    <!-- 게시판 기본 -->
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">구분</th>
                <th width="500">제목</th>
                <th width="120">작성자</th>
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
              //댓글 수 카운트
              $sql2 = mq("select * from reply where con_num='".$board['idx']."'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
              $rep_count = mysqli_num_rows($sql2); //num_rows로 정수형태로 출력
        ?>
        <tbody>
            <tr>
              <td width="70"><?php echo $board['idx']; ?></td>
              <td width="500">
              <?php
                $lockimg = "<img src='/pajji/createweb/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
                  if($board['lock_post']=="1"){
              ?>
                  <a href='/pajji/createweb/ck_read.php?idx=<?php echo $board["idx"];?>'>
              <?php echo $title, $lockimg;
                  }else{
              ?>
              <!--- 추가부분 18.08.01 --->
              <?php
                $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
                $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음

                if($boardtime==$timenow){
                  $img = "<img src='/pajji/createweb/img/new.png' alt='new' title='new' />";
                }else{
                  $img ="";
                }
                ?>
              <!-- 게시물 읽기, 경로, idx는 게시물 번호 -->
              <a href='/pajji/createweb/read.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?> </span></a></td>
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

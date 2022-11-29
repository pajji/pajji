<?php
require_once('lib/top.php');
?>
<body>
<div id="board_area">
<!-- 검색 추가 -->
<?php

  /* 검색 변수 */
  $catagory = $_GET['catgo'];
  $search_con = $_GET['search'];
  $start_date = $_GET['date_from'];
  $end_date = $_GET['date_to'];

?>
  <h1><a href="/pajji/freeboard/index.php">회원게시판</a></h1>
  <h2><?php echo $catagory; ?>에서 '<?php echo $search_con; ?>'검색결과</h2>
  <h4 style="margin-top:30px;"><a href="/pajji/freeboard/index.php">홈으로</a></h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
          if($start_date && $end_date){
            $sql2 = "select * from board where created between '$start_date' and '$end_date';";
          }
          $sql3 = mq("select * from board where $catagory like '%$search_con%'");
          while($board = $sql3->fetch_array()){
          $title=$board["title"];
            if(strlen($title)>30)
              {
                $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
              }
            $sql4 = mq("select * from reply where con_num='".$board['idx']."'");
            $rep_count = mysqli_num_rows($sql4);
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
            <?php
              $lockimg = "<img src='/pajji/freeboard/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
              if($board['lock_post']=="1")
              { ?><a href='/pajji/freeboard/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
              }else{?>

            <?php
              require_once('lib/new.php');
            ?>
        <!--- 읽기 추가 -->
        <a href='/pajji/boasrd/read.php?idx=<?php echo $board["idx"]; ?>'><span style="background:yellow;"><?php echo $title; }?></span><span class="re_ct">[<?php echo $rep_count;?>]<?php echo $img; ?> </span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>

        </tr>
      </tbody>

      <?php } ?>
    </table>
    <!-- 검색 추가 -->
    <div id="search_box2">
      <form action="/pajji/freeboard/search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required"/> <button>검색</button>
      <input type="date" name="date_from" />
      <input type="date" name="date_to" />
    </form>
  </div>
</div>
</body>
</html>

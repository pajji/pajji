<?php
require_once('lib/top.php');
?>
<body>
<div id="board_area">
  <h1><a href="/pajji/board/index.php">자유게시판</a></h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
    <table class="list-table">
      <?php
      require_once('lib/columnset.php');
      ?>
        <?php

            if(isset($_GET['page'])){
              $page = $_GET['page'];
                }else{
                  $page = 1;
                }

                /* 컬럼정렬 추가 */
                  //sortColumn, sortType변수 선언
                  $sortColumn="";
                  $sortType="";


                  $sql = mq("select * from board");
                  $row_num = mysqli_num_rows($sql); //게시판 총 레코드 수
                  $list = 3; //한 페이지에 보여줄 개수
                  $block_ct = 3; //블록당 보여줄 페이지 개수

                  $block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
                  $block_start = (($block_num - 1) * $block_ct) + 1; // 블록의 시작번호
                  $block_end = $block_start + $block_ct - 1; //블록 마지막 번호

                  $total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
                  if($block_end > $total_page) $block_end = $total_page; //만약 블록의 마지박 번호가 페이지수보다 많다면 마지박번호는 페이지 수
                  $total_block = ceil($total_page/$block_ct); //블럭 총 개수
                  $start_num = ($page-1) * $list; //시작번호 (page-1)에서 $list를 곱한다.

                  /* 컬럼정렬 추가 */
                  if(isset($_GET['column']) && isset($_GET['sortType'])){ //isset으로 column과 sortType을 체크하고
                    //값이 잇다면 해당변수에 GET데이터 넣고 쿼리문에 order by영역에 각 변수로 세팅
                    $sortColumn = $_GET['column'];
                    $sortType = $_GET['sortType'];
                    $sql2 = mq("select * from board order by $sortColumn $sortType limit $start_num, $list");
                  }else{
                    //아닌경우 idx(번호)기준 desc
                    $sql2 = mq("select * from board order by idx desc limit $start_num, $list");
                  }
                  /* 컬럼정렬 추가 끝*/

                  while($board = $sql2->fetch_array()){
                  $title=$board["title"];
                    if(strlen($title)>30)
                    {
                      $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                    }
                    $sql3 = mq("select * from reply where con_num='".$board['idx']."'");
                    $rep_count = mysqli_num_rows($sql3);
                  ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $board['idx']; ?></td>
          <td width="500">
            <?php
              $lockimg = "<img src='/pajji/board/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
              if($board['lock_post']=="1")
              { ?><a href='/pajji/board/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
              }else{?>

            <?php
              require_once('lib/new.php');
            ?>
        <!-- 읽기 추가 -->
        <a href='/pajji/board/read.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?><span class="re_ct">[<?php echo $rep_count;?>] </span></a></td>
          <td width="120"><?php echo $board['name']?></td>
          <td width="100"><?php echo $board['date']?></td>
          <td width="100"><?php echo $board['hit']; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <?php
      require_once('lib/page_num.php');
    ?>
<div id="write_btn">
      <a href="/pajji/board/write.php"><button>글쓰기</button></a>
</div>
  <!-- 검색 추가 -->
  <div id="search_box">
    <form action="/pajji/board/search_result.php" method="get">
      <select name="catgo">
        <option value="title">제목</option>
        <option value="name">글쓴이</option>
        <option value="content">내용</option>
      </select>
      <input type="text" name="search" size="40" required="required" />
      <button id="b_searchBtn">검색</button>
    </form>
    <!-- 컬럼정렬 추가 -->
    <form action="/pajji/board/index.php" method="get" id="sortForm">
      <input type="hidden" name="column" id="column" value="" />
      <input type="hidden" name="sortType" id="sortType" value="desc" />
    </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script>
    function b_sort(cloumn, sortType){
      $("#column").val(cloumn);
      switch(sortType){
        case 'asc': sortType='desc'
        break;
        case 'desc': sortType='asc'
        break;
        default: sortType='desc'
        break;
      }
      $("#sortType").val(sortType);
      $("#sortForm").submit();
    }
  </script>
</body>
</html>

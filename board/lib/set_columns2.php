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

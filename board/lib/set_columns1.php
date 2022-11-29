<thead>
    <tr>
      <?php
        /* 컬럼정렬 추가 */
        //GET sortType이 있는지 체크
        if(isset($_GET['sortType'])){
          //있다면 GET에서 받아온 데이터 넣음
          $sortType = $_GET['sortType'];
          //sortType이 desc일 경우 문자넣기
          switch($sortType){
            case "desc" :  $sortText = '▼';
            break;
            case "asc" :  $sortText = '▲';
          }
        }else{
          //그 외 기본
          $sortType = 'desc';
          $sortText = '▼';
        }
      ?>
        <th width="70"><a onclick="b_sort('idx','<?php echo $sortType ?>')" href="#">번호<span style="color:red;">
          <?php
            //column GET데이터가 있으면
            if(isset($_GET['column'])){
              //이 GET데이터가 각 컬럼명과 같으면 sortText변수 표시
              if($_GET['column']=="idx")
                echo $sortText;
              }else{
                echo $sortText;
            }
            ?>
        </style></th>
          <th width="500"><a onclick="b_sort('title','<?php echo $sortType ?>')" href="#">제목<span style="color:red;">
            <?php
              //위와 같은 방식 하지만 기본정렬은 idx이므로 column값 체크시 else는 필요가 없다
              if(isset($_GET['column'])){
                 if($_GET['column']=="title")
                  echo $sortText;
                 }
            ?>
          </style></th>
          <th width="120"><a onclick="b_sort('name','<?php echo $sortType ?>')" href="#">글쓴이<span style="color:red;">
            <?php
              if(isset($_GET['column'])){
                 if($_GET['column']=="name")
                  echo $sortText;
                 }
            ?>
          </style></th>
          <th width="100"><a onclick="b_sort('date','<?php echo $sortType ?>')" href="#">작성일<span style="color:red;">
            <?php
              if(isset($_GET['column'])){
                 if($_GET['column']=="date")
                  echo $sortText;
                 }
            ?>
          </style></th>
          <th width="100"><a onclick="b_sort('hit','<?php echo $sortType ?>')" href="#">조회수<span style="color:red;">
            <?php
              if(isset($_GET['column'])){
                 if($_GET['column']=="hit")
                  echo $sortText;
                 }
            ?>
          </style></th>
          <!--/* 컬럼정렬 추가 끝 */-->
      </tr>
  </thead>

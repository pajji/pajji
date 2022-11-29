<!-- 추가부분 18.08.01 -->
<?php
  $boardtime = $board['date']; //$boardtime변수에 board['date']값을 넣음
  $timenow = date("Y-m-d"); //$timenow변수에 현재 시간 Y-M-D를 넣음

  if($boardtime==$timenow){
    $img = "<img src='/pajji/userboard/img/new.png' alt='new' title='new' />";
  }else{
    $img ="";
  }
  ?>

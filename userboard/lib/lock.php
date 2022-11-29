<tbody>
  <tr>
    <td width="70"><?php echo $board['idx']; ?></td>
    <td width="500">
      <?php
        $lockimg = "<img src='/pajji/freeboard/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
        if($board['lock_post']=="1")
        { ?><a href='/pajji/freeboard/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
        }else{?>

<?php
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
$lockimg = "<img src='/pajji/freeboard/img/lock.png' alt='lock' title='lock' with='20' height='20' />";
if($board['lock_post']=="1")
{ ?><a href='/pajji/freeboard/ck_read.php?idx=<?php echo $board["idx"];?>'><?php echo $title, $lockimg;
}else{?>

<?php
require_once('lib/new.php');
?>
<!-- 읽기 추가 -->
<a href='/pajji/freeboard/read.php?idx=<?php echo $board["idx"]; ?>'><?php echo $title; }?><span class="re_ct">[<?php echo $rep_count;?>] </span></a></td>
<td width="120"><?php echo $board['name']?></td>
<td width="100"><?php echo $board['date']?></td>
<td width="100"><?php echo $board['hit']; ?></td>

</tbody>
<?php } ?>
</table>

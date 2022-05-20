<?php

  require 'lib.php';

  $idx = $_POST['idx'];
  $memo = $_POST['memo'];
  $reg_date = date("Y-m-d H:i:s");

  $idx = mysqli_real_escape_string($connect, $idx);
  $memo = mysqli_real_escape_string($connect, $memo);

  if($idx) {

  $query = "select * from uni_memo where idx='$idx' order by reg_date desc";
  $result = mysqli_query($connect, $query);
  $data = mysqli_fetch_array($result);

  $query = "update uni_memo set memo='$memo', reg_date='$reg_date' where idx='$idx' order by reg_date desc";
  mysqli_query($connect, $query);
}
?>

<script>
  location.href="memo.php";
</script>
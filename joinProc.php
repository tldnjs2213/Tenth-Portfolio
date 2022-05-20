<?php
  require "lib.php";

  $data = array($_POST['user_id'], $_POST['pwd'], $_POST['name'], $_POST['email']);

  $data[0] = mysqli_real_escape_string($connect, $data[0]);
  $data[1] = mysqli_real_escape_string($connect, $data[1]);
  $data[2] = mysqli_real_escape_string($connect, $data[2]);
  $data[3] = mysqli_real_escape_string($connect, $data[3]);
  
  $data[4] = date("Y-m-d H:i:s");
  $data[5] = $_SERVER['REMOTE_ADDR'];

  $query = "insert into uni_member(user_id, pwd, name, email, reg_date, ip) values('$data[0]', password('$data[1]'), '$data[2]', '$data[3]', '$data[4]', '$data[5]')";
  $result = mysqli_query($connect, $query);
  $records = mysqli_affected_rows($connect);

  if($records == 1) {
    echo 'OK';
    Header("Location: index.php");
  } else {
    echo '<script>alert("없는 아이디 이거나 동일 아이디가 존재합니다.");
    location.href="join.php";</script>';
  }
?>
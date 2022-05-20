<?php
  session_start();
  require "lib.php";

  if (!isset($_SESSION['isLoginId'])) {
    echo "로그인 후 이용해주세요.";
    exit;
  }

  $data[0] = $_SESSION['isLoginId'];
  $data[1] = $_POST['memo'];
  $data[2] = date("Y-m-d H:i:s");

  $data[0] = mysqli_real_escape_string($connect, $data[0]);
  $data[1] = mysqli_real_escape_string($connect, $data[1]);

  $query = "insert into uni_memo(user_id, memo, reg_date) values('$data[0]', '$data[1]', '$data[2]')";
  mysqli_query($connect, $query);

  Header("Location: memo.php");
?>
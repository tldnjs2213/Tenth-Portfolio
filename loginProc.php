<?php
  session_start();
  require "lib.php";

  $user_id = $_POST['user_id'];
  $pwd = $_POST['pwd'];

  $user_id = mysqli_real_escape_string($connect, $user_id);
  $pwd = mysqli_real_escape_string($connect, $pwd);

  $query = "select * from uni_member where user_id='$user_id'";
  $result = mysqli_query($connect, $query);
  $data = mysqli_fetch_assoc($result);


  if (!$data['idx']) {
    echo '<script>alert("존재하지 않는 회원입니다.");
    location.href="index.php";</script>';
    exit;
  }

  $query = "select * from uni_member where pwd=password('$pwd')";
  $result = mysqli_query($connect, $query);
  $tmp = mysqli_fetch_assoc($result);

  if ($data['pwd'] != $tmp['pwd']) {
    echo '<script>alert("로그인 정보가 잘못되었습니다.");
    location.href="index.php";</script>';
    exit;
  }

  $_SESSION['isLoginId'] = $user_id;

  Header("Location: memo.php");
?>
<?php
  require './inc/dbInfo.inc';

  error_reporting(1);
  ini_set("display_errors", 1);
  
  date_default_timezone_set('Asia/seoul');
  
  $connect = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()) {
    echo "mysql 접속중 오류가 발생했습니다.";
    echo mysqli_connect_error();
  }
?>
<?php
  require "lib.php";

  $idx = $_GET['idx'];
  $idx = mysqli_real_escape_string($connect, $idx);

  $query = "select * from uni_memo where idx='$idx'";
  $result = mysqli_query($connect, $query);
  $data = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>메모 수정</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      text-decoration: none;
      box-sizing: border-box;
    }

    html, body {
      width: 100%;
      height: 100%;
      position: relative;
    }

    form {
      width: 50%;
      height: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    
    form table {
      width: 100%;
      height: 100%;
    }

    form textarea {
      width: 100%;
      height: 100%;
    }

    form tr:first-child {
      width: 100%;
      height: 90%;
    }

    form tr:last-child {
      width: 100%;
      height: 10%;
    }

    input {
      font-size: 1.2vw;
      border: 0;
      cursor: pointer;
      background-color: #fff;
    }
  </style>
</head>
<body>
  <form action="modifyProc.php" method="post">
    <input type="hidden" name="idx" value="<?=$idx?>"> <!-- idx 값 넘겨주기 -->
    <table width=800 border="1" cellpadding=5>
      <tr>
        <th>메모</th>
        <td>
          <textarea name="memo"><?=$data['memo']?></textarea>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <div style="text-align: center;">
            <input type="submit" value="저장">
          </div>
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
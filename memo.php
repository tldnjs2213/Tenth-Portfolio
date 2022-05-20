<?php
  session_start();
  require 'lib.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>메모장</title>
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
    h1 {
      font-size: 3.5vw;
      text-align: center;
    }
    section {
      width: 80%;
      height: 80%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    form {
      width: 100%;
      height: 50%;
    }

    form textarea {
      width: 100%;
      height: 80%;
      padding: 1vw;
    }

    form a:visited {
      color: black;
    }

    form a, button {
      border: 1px solid blue;
      font-size: 1.2vw;
      border: 0;
      cursor: pointer;
      background-color: #fff;
      float: right;
      margin-right: 1.5vw;
    }
    div {
      width: 100%;
      height: 50%;
      overflow-x: auto;
    }
    table {
      width: 100%;
      margin: 0 auto;
      overflow-x: auto;
    }

    table td {
      width: 20%;
      text-align: center;
    }

  </style>
</head>
<body>
  <h1>메모장</h1>
  <section>
    <?php if (isset($_SESSION['isLoginId'])) { ?>
    <form action="memoProc.php" method="post" >
      <input type="hidden" name="idx" value="<?=$idx?>">
      <textarea name="memo" placeholder="메모를 입력해주세요."></textarea><br>
      <a href="logOut.php">로그아웃</a>
      <button type="submit">저장</button>
    </form>

    <div>
      <table border=1>
        <tr>
          <th>아이디</th>
          <th>메모</th>
          <th>등록일</th>
          <th>수정</th>
          <th>삭제</th>
        </tr>
        <?php
          $query = "select * from uni_memo where user_id='$_SESSION[isLoginId]' order by idx desc";
          $result = mysqli_query($connect, $query);
          while($list = mysqli_fetch_assoc($result)) {          
        ?>

        <tr>
          <td><?=$list['user_id']?></td>
          <td><?=nl2br($list['memo'])?></td>
          <td><?=$list['reg_date']?></td>
          <td><a href="modify.php?idx=<?=$list['idx']?>">수정</a></td>
          <td><a href="del.php?idx=<?=$list['idx']?>" onclick="return confirm('정말 삭제할까요?');">삭제</a></td>
        </tr>

        <?php } ?>
        
      </table>
    </div>
  </section>
  <?php } ?>
</body>
</html>
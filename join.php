<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입</title>
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
      width: 20%;
      height: 50%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: #eee;
      border-radius: 2vw;
      box-shadow: 0.5vw 0.5vw 0.5vw 0.5vw lightgray;
    }
    form h1 {
      height: 16.666%;
    }
    form div {
      width: 100%;
      height: 16.666%;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
    }
    form div input {
      border: 0.1vw solid black;
      height: 2vw;
      padding-left: 0.5vw;
    }
    form button {
      font-size: 1.2vw;
      border: 0;
      cursor: pointer;
    }
  </style>
  <script>
    chkFrm = () => {
      let user_id = document.querySelector('#user_id');
      let pwd = document.querySelector('#pwd');
      let name = document.querySelector('#name');
      let email = document.querySelector('#email');
      const regExId = /^[a-z]+[a-z0-9]{5,19}$/g;
      const regExPwd = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
      const regExEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-z])*\.[a-zA-Z]{2,3}$/i;
      
      if (user_id.value == '') {
        alert('id를 입력해주세요.');
        user_id.focus();
        return false;
      }
      if (pwd.value == '') {
        alert('pw를 입력해주세요.');
        pwd.focus();
        return false;
      }
      if (name.value == '') {
        alert('이름을 입력해주세요.');
        name.focus();
        return false;
      }
      if (email.value == '') {
        alert('이메일을 입력해주세요.');
        email.focus();
        return false;
      }

      if (!regExId.test(user_id.value)) {
        alert('아이디는 영문자로 시작하는 6~20자 영문자 또는 숫자이어야 합니다.');
        user_id.focus();
        return false;
      }
      if (!regExPwd.test(pwd.value)) {
        alert('비밀번호는 최소 8 자, 하나 이상의 문자, 하나의 숫자 및 하나의 특수 문자이어야 합니다.');
        pwd.focus();
        return false;
      }
      if (!regExEmail.test(email.value)) {
        alert('이메일을 정확하게 입력해주세요.');
        email.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
  <form action="joinProc.php" method="post" onsubmit="return chkFrm();">
    <h1>회원가입</h1>
    <div>
    &nbsp;&nbsp;&nbsp;&nbsp;id :&nbsp;<input type="text" name="user_id" id="user_id" placeholder="아이디">
    </div>
    <div>
    &nbsp;&nbsp;&nbsp;pw :&nbsp;<input type="password" name="pwd" id="pwd" placeholder="pw">
    </div>
    <div>
    &nbsp;&nbsp;이름 :&nbsp;<input type="text" name="name" id="name" placeholder="이름">
    </div>
    <div>
      이메일 :&nbsp;<input type="text" name="email" id="email" placeholder="이메일">
    </div>
    <button type="submit">회원가입</button>
  </form>
</body>
</html>
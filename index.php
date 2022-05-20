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
  <title>로그인 / 회원가입</title>
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
    }

    main {
      width: 100vw;
      height: 100vh;
      position: relative;
    }

    main section {
      width: 20%;
      height: 60%;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #eee;
      border-radius: 2vw;
      box-shadow: 0.5vw 0.5vw 0.5vw 0.5vw lightgray;
    }

    form {
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: absolute;
    }

    h1 {
      width: 100%;
      height: 20%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 4vw;
    }

    article.articleInputContainer {
      width: 100%;
      height: 30%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    article.articleInputContainer input:first-child {
      margin-bottom: 1vw;
    }

    article.articleInputContainer input {
      padding-left: 1vw;
      height: 2vw;
    }

    article.articleCaptureContainer {
      width: 100%;
      height: 30%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    article.articleCaptureContainer input {
      padding-left: 1vw;
      height: 2vw;
    }

    article.articleButtonContainer {
      width: 100%;
      height: 20%;
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    article.articleButtonContainer a:visited {
      color: black;
    }

    article.articleButtonContainer a, button {
      font-size: 1.2vw;
      border: 0;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <main>
    <section>
      <form action="loginProc.php" method="post">
        <h1>로그인</h1>
        <article class="articleInputContainer">
          <label>
          &nbsp;ID : <input id="user_id" type="text" name="user_id" placeholder="아이디">
          </label>
          <label>
            PW : <input id="pwd" type="password" name="pwd" placeholder="비밀번호">
          </label>
        </article>
        <article class="articleCaptureContainer">
          <canvas id="cptArea" class="cptArea"></canvas>
          <label>
            보안 <input id="secureNumber" type="text" autocomplete="off" required>
          </label>
        </article>
        <article class="articleButtonContainer">
          <a href="join.php">회원가입</a>
          <button id="openSubmit" type="submit" disabled="disabled">로그인</button>
        </article>
      </form>
    </section>
  </main>
  <script>
      const secureNumber = document.querySelector("#secureNumber");
			let randomNumber = Math.floor( Math.random()*(9999-1000+1) ) + 1000;
			let cptArea = document.getElementById("cptArea");
			let ctx = cptArea.getContext("2d");
			ctx.font = "100px Malgun Gothic";
			ctx.fillStyle = "blue";
			ctx.textAlign = "center";
			ctx.fillText(randomNumber, cptArea.width/2, cptArea.height/1.35);

			let completeSecureNumber = e => {
				const user_id = document.querySelector("#user_id").value;
				const pwd = document.querySelector("#pwd").value;
				const openSubmit = document.querySelector("#openSubmit");
				if ( user_id && pwd && randomNumber == e.target.value ) {
					openSubmit.removeAttribute("disabled");
				} 
			}
			secureNumber.addEventListener("keyup", completeSecureNumber);
  </script>
</body>
</html>
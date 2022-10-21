<?php
require_once('lib/top.php');
?>
</head>
<body>
  <div style="text-align:center">
  <h1>회원가입</h1>
  </div>
    <form action="signupProcess.php" method="POST" id="signup-form">
        <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3 ">
          <input type="text" name="username" id="username" placeholder="아이디입력">
          <input type="button" id="checkIdBtn" value="중복확인" onclick="checkId()">
          <p id="result">&nbsp;</p>
        </div>
        <div class="mb-3 ">
          <input name="password" type="password" class="form-control" id="password" placeholder="비밀번호 입력">
        </div>
        <div class="mb-3 ">
          <input type="password" class="form-control" id="password-check" placeholder="비밀번호 재확인">
        </div>
          <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button>
        </div>
    </form>
    <script>
        const signupForm = document.querySelector("#signup-form");
        const signupButton = document.querySelector("#signup-button");
        const password = document.querySelector("#password");
        const passwordCheck = document.querySelector("#password-check");
        signupButton.addEventListener("click", function(e) {
            if(password.value&& password.value === passwordCheck.value){
            signupForm.submit();
            }else{
                alert("비밀번호가 서로 일치하지 않습니다");
            }
        });
    </script>

</body>
</html>

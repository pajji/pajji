<?php
require_once('lib/top.php');
?>
</head>
<body>
  <div style="text-align:center">
  <h1>로그인</h1>
  </div>
    <form method="POST" action="loginprocess.php">
    <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3 ">
            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="아이디">
        </div>
        <div class="mb-3 ">
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="비밀번호">
        </div>
        <div style="text-align:center">
        <h6>계정이 없으신가요? <a href="signup.php">회원가입</a></h6>
        </div>
        <button type="submit" class="btn btn-primary mb-3">로그인</button>
    </div>
    </form>
</body>
</html>

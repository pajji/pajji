<?php
require_once('lib/top.php');
?>
<head>
<body>
  <div style="text-align:center">
    <h1>Level4</h1><br>
    <h6>pajji4 계정으로 로그인하시오.</h6>
  </div>
    <form method="POST" action="login4process.php">
    <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3 ">
            <input name="username" type="text" class="form-control" id="exampleFormControlInput1" placeholder="아이디">
        </div>
        <div class="mb-3 ">
            <input name="password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="비밀번호">
        </div>
        <button type="submit" class="btn btn-primary mb-3">로그인</button>
    </div>
    </form>
</body>
</html>

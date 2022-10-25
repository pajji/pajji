<?php
require_once('lib/top.php');
?>
<script>
function Blacklist(obj) { // 공백사용못하게
    var str_space = /\s/;  // 공백체크
    if(str_space.exec(obj.value)) { //공백 체크
        alert("해당 문자를 사용할수 없습니다.\n자동적으로 제거 됩니다.");
        obj.focus();
        obj.value = obj.value.replace(' ',''); // 공백제거
        return false;
    }
 // onkeyup="noSpaceForm(this);" onchange="noSpaceForm(this);"
}
</script>
</head>
<body>
  <div style="text-align:center">
    <h1>Level999</h1><br>
    <h6>pajji999 계정으로 로그인하시오.</h6>
  </div>
    <form method="POST" action="login999process.php">
    <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3 ">
            <input name="user_id" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="아이디" onkeyup="Blacklist(this);" onchange="Blacklist(this);">
        </div>
        <div class="mb-3 ">
            <input name="user_pw" type="password" class="form-control" id="exampleFormControlInput1" placeholder="비밀번호" onkeyup="Blacklist(this);" onchange="Blacklist(this);">
        </div>
        <button type="submit" class="btn btn-primary mb-3">로그인</button>
    </div>
    </form>
</body>
</html>
{pajji999level!]

<?php
require_once('lib/top.php');
?>
<script>
	function address(){
		url = "address.php";
		window.open(url,"addr",'width=500,height=400, scrollbars=no, resizable=no');
	}
	function checkid(){
	var username = document.getElementById("username").value;
	if(username)
	{
		url = "/pajji/createweb/check.php?username="+username;
			window.open(url,"chkid","width=300,height=100");
		}else{
			alert("아이디를 입력하세요");
		}
	}
</script>
</head>
<body>
  <div style="text-align:center";>
	<br/><h1>회원가입</h1><br/>
    <form action="signupProcess.php" method="POST" id="signup-form">
			<div style="margin-left:30px;">
        <input type="text" name="username" id="username" placeholder="아이디입력">
				<input type="button" value="중복검사" onclick="checkid();" />
				<input type="hidden" value="0" name="chs" />
			</div><br/>
			<div style="margin-right:30px;">
				<input type="password" name="password" id="password" placeholder="비밀번호 입력" style="width:200px;">
			</div><br/>
			<div style="margin-right:30px;">
		    <input type="password"  id="password-check" placeholder="비밀번호 재확인" style="width:200px;">
			</div><br/>
			<div style="margin-right:50px;">
        <input type="text" class=textform  name="join_addr" id="addr" onclick="address();" placeholder="주소를 검색해주세요." required>
			</div><br/>
			<div>
          <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button>
			</div>
		</div>
    </form>
		</table>
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

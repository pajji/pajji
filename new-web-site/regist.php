<head>
	<link rel="stylesheet" href="./lib/css/style.css">
</head>
<body>
    <div id="regist_wrap" class="wrap">
        <div>
            <h1>Regist Form</h1>
            <form action="regist_ok.php" method="post" name="regiform" id="regist_form" class="form" onsubmit="return sendit()">
              <p><input type="text" name="username" id="username" placeholder="아이디 입력">
                <input type="button" id="checkIdBtn" value="중복확인" onclick="checkId()"></p>
                <p id="result">&nbsp;</p>
                <p><input type="password" name="password" id="password" placeholder="비밀번호 입력"></p>
                <p><input type="password" name="password_ch" id="password_ch" placeholder="비밀번호 재입력"></p>
                <p><input type="submit" value="회원가입" class="signup_btn"></p>
                <p class="pre_btn">Are you join? <a href="index.php">Login.</a></p>
            </form>
        </div>
    </div>
    <script src="./lib/js/regist.js"></script>
</body>

<head>
	<link rel="stylesheet" href="./lib/css/style.css">
</head>
<body>
<div id="login_wrap">
    <div>
        <h1>Login Form</h1>
        <form action="login_ok.php" method="post" id="login_warp">
            <p><input type="text" name="username" id="username" placeholder="ID"></p>
            <p><input type="password" name="password" id="password" placeholder="Password"></p>
            <p class="forgetpw"><a href="changepw.php">Forget Password?</a></p>
            <p><input type="submit" value="Login" class="login_btn"></p>
        </form>
        <p class="regist_btn">Not a member? &nbsp;<a href="regist.php">Sign Up</a></p>
    </div>
</div>
</body>

<?php
session_start();
?>
<?php
require_once('lib/top.php');
?>
</head>
<body>
  <?php
  if (isset($_SESSION['username'])) {
      echo "{$_SESSION['username']}님 환영합니다.";
  ?>
      <li class="nav-item d-flex align-items-center" onclick="logout()">로그아웃</li>
  <?php
  } else {
  ?>
  <div style ="text-align:center";>
    <p><h1>Practice SQL Injection Web-Site</h1></p>
      <p><h2><a href="login1.php">level1</li></h2></P>
      <p><h2><a href="login2.php">level2</li></h2></P>
      <p><h2><a href="login3.php">level3</li></h2></P>
      <p><h2><a href="login4.php">level4</li></h2></P>
      <p><h2><a href="login5.php">level5</li></h2></P>
  </div>
<?php
}
 ?>
 <script>
     function logout() {
         console.log("hello");
         const data = confirm("로그아웃 하시겠습니까?");
         if (data) {
             location.href = "logoutprocess.php";
         }

     }
 </script>
</body>
</html>

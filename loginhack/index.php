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
      <p><h2><a href="login1.php">Level1</a></h2></P>
      <p><h2><a href="login2.php">Level2</a></h2></P>
      <p><h2><a href="login3.php">Level3</a></h2></P>
      <p><h2><a href="login4.php">Level4</a></h2></P>
      <p><h2><a href="login5.php">Level5</a></h2></P>
      <p><h2><a href="login999.php">Level999</a></h2></P>
  </div>
  <br>
  <div style ="text-align:center";>
   <p><h3>TEST ACCOUNT</h3></p>
   <p><h4>LEVEL 1,2,5 : test1 / 1234</h4></p>
   <p><h4>LEVEL 3,4,999 : test2 / 1234</h4></p>
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

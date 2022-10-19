<!DOCTYPE html>
<html lang="" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>아이디 중복체크</title>
    <script>
      window.onload = function(event){
          document.getElementById("idcheck").onclick = function(){
              var userid = document.getElementById("username").value;
              window.opener.document.getElementById("username").value = username;
              window.close();
          }
      }
  </script>
  </head>
  <body>
    <form method="POST" action="idcheckprocess.php">
    <div id="target">
      <input type="username" name="username" id="username" placeholder="아이디 입력">
      <input type="button" id="idcheck"  value="중복체크">
    </div>
  </body>
</html>

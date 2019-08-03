# Lab5 -- Double Injection - Single Quotes

+ 输入`?id=1`没有任何数据显示在网页上，只有一句`You are in...`，我要的数据啊喂
+ 这里是双注入的原理解释链接
  + https://blog.csdn.net/lixiangminghate/article/details/80466257
  + https://mochazz.github.io/2017/09/23/Double_%20SQL_Injection/#0x01-%E5%8F%8C%E6%9F%A5%E8%AF%A2这个链接更好一些
+ 双注入原理：count聚合函数（聚合说的这么高端，其实就是一个count的过程罢了）遇到分组函数会报错，显示部分数据库内容 -- 存在几率显示

- [ ] 为什么会存在几率触发呢？

+ 基础解释：
  + random()函数生成大于0小于1的数
  + floor()向下取整
  + count()聚合函数 -- 返回当前表的所有记录数
  + concat()之前有解释过了

+ 实战

  + 输入?id=1‘会报错

  ```
  You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ''1'' LIMIT 0,1' at line 1
  
  ```

  + 然并卵，这时候数据库搜索出的结果都不显示在网页上
  + --> 双注入
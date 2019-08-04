
<?php
header("Content-type: text/html; charset=utf-8");
date_default_timezone_set('Asia/shanghai'); 
echo 'Current PHP version: ' . phpversion()."</br>";
echo 'Server: ' .$_SERVER['SERVER_SOFTWARE']."</br>";
echo 'Loaded php.ini: ' . php_ini_loaded_file()."<br>";

echo 'sys_temp_dir: '.sys_get_temp_dir()."<br>";
echo 'Current script owner: ' . get_current_user()."<br>";
echo 'Current php memory: ' . memory_get_usage()/1024 ." Kb<br>";
echo 'USER_AGENT: ' .$_SERVER["HTTP_USER_AGENT"]."<br>";
echo 'Disabled Functions: ' .@ini_get("disable_functions")."<br>";

//echo @file_get_contents("");
/*
if ($stream = @fopen(php_ini_loaded_file(), 'r')) {
    echo stream_get_contents($stream);
    fclose($stream);
}else
echo "no permission!<br>";
*/

$dir='c:\\';

echo "dir: ".$dir."<br>";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
	    echo "<table>";
		echo "<tr><td><font color='red'>Filename</font></td>  <td><font color='red'>Filesize</font></td> <td><font color='red'>FileTime</font></td>";
        while (($file = readdir($dh)) !== false) 
		{
            echo "<tr><td> $file</td>  <td>" . filesize($dir.'/'.$file) . "byte</td><td>".date("Y-m-d H:i:s",filemtime($dir.'/'.$file))."</td>";
        }
		echo "</table>";
        closedir($dh);
    }
}

/*
foreach (get_loaded_extensions() as $value) {
    echo "Value: $value<br />\n";
}
*/

//echo cos(pi());

$client_ipaddr = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$client_ipaddr = ($client_ipaddr) ? $client_ipaddr : $_SERVER["REMOTE_ADDR"];
echo "ipaddress: ".$client_ipaddr."<br>";


if(getenv('HTTP_CLIENT_IP')){
$onlineip = getenv('HTTP_CLIENT_IP');
}
elseif(getenv('HTTP_X_FORWARDED_FOR')){
$onlineip = getenv('HTTP_X_FORWARDED_FOR');
}
elseif(getenv('REMOTE_ADDR')){
$onlineip = getenv('REMOTE_ADDR');
}
else{
$onlineip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
}
echo "ipaddress: ".$onlineip."<br>";



function get_real_ip()
{
$ip=false;
if(!empty($_SERVER["HTTP_CLIENT_IP"])){
  $ip = $_SERVER["HTTP_CLIENT_IP"];
}
if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
  if($ip){
   array_unshift($ips, $ip); $ip = FALSE;
  }
  for($i = 0; $i < count($ips); $i++){
   if (!eregi ("^(10|172\.16|192\.168)\.", $ips[$i])){
    $ip = $ips[$i];
    break;
   }
  }
}
return($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
echo "ipaddress: ".get_real_ip()."<br>";

?>






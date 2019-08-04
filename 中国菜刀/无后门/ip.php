<?php
$client_ipaddr = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$client_ipaddr = ($client_ipaddr) ? $client_ipaddr : $_SERVER["REMOTE_ADDR"];
echo $client_ipaddr;
?>
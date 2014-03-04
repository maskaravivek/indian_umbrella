<?php
include 'config.php';

$ip = $_SERVER['REMOTE_ADDR'];
$query_ip = mysql_query("SELECT `id` FROM `ip` WHERE `ip`='$ip' ");

$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$query_url = mysql_query("SELECT `id` FROM `count` WHERE `page_url`='$url' ");

if(mysql_num_rows($query_ip) == 0)
{
	mysql_query("INSERT INTO `ip`(`ip`) VALUES('$ip')");
	
	if(mysql_num_rows($query_url) == 0){mysql_query("INSERT INTO `count`(`page_url`) VALUES('$url') ");}
	else{mysql_query("UPDATE `count` SET `total`=`total`+1, `unique`=`unique`+1 WHERE `page_url`='$url' ");}

}
	
else{
	if(mysql_num_rows($query_url) == 0){mysql_query("INSERT INTO `count`(`page_url`) VALUES('$url') ");}
	else{mysql_query("UPDATE `count` SET `total`=`total`+1 WHERE `page_url`='$url' ");}
}

?>
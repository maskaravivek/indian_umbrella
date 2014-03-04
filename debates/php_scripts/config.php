<?php
$mysql_hostname = "theindumb.db.11621953.hostedresource.com";
$mysql_user = "theindumb";
$mysql_password = "vvk@0FF1cer";
$mysql_database = "theindumb";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

?>
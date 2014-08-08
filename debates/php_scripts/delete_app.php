<?php
include("config.php");
if($_GET['id'])
{
$id=$_GET['id'];
mysql_query("delete FROM applications WHERE user_data_id='$id'");
}
?>
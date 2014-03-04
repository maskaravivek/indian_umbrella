<?php
include("config.php");
if($_POST['id'])
{
$id=$_POST['id'];
$stat=$_POST['status'];
mysql_query("update applications SET status='$stat' WHERE user_data_id='$id'");
}
?>
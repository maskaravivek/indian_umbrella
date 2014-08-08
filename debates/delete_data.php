<?php
include("config.php");
if($_POST['msg_id'])
{
$id=$_POST['msg_id'];
$id = mysql_escape_String($id);
$sql = "delete from comments where comment_id='$id'";
mysql_query( $sql);
}
?>
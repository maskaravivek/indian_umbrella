<?php
include("config.php");

$ip=$_SERVER['REMOTE_ADDR']; 
if($_POST['id'])
{
$id=$_POST['id'];
$id = mysql_escape_String($id);

$ip_sql=mysql_query("select ip_add from a6158264_test1.Voting_IP where mes_id_fk='$id' and ip_add='$ip'");
$count=mysql_num_rows($ip_sql);

if($count==0)
{
$sql = "update a6158264_test1.debates set up=up+1  where id='$id'";
mysql_query( $sql);

$sql_in = "insert into a6158264_test1.Voting_IP (mes_id_fk,ip_add) values ('$id','$ip')";
mysql_query( $sql_in);



}
else
{
}

$result=mysql_query("select up,down from a6158264_test1.debates where id='$id'");
$row=mysql_fetch_array($result);
$down_value=$row['down'];
$up_value=$row['up'];
$up_per=round(($up_value/($up_value+$down_value))*100,2);
echo "$up_per";
}
?>
<?php
include("config.php");

$ip=$_SERVER['REMOTE_ADDR']; 
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$name=mysql_escape_String($_POST['name']);
if($name=="up")
$oth_name="down";
else
$oth_name="up";
$ip_sql=mysql_query("select ip_add,opinion from Voting_IP where mes_id_fk='$id' and ip_add='$ip'");
$count=mysql_num_rows($ip_sql);
$row=mysql_fetch_array($ip_sql);
$opinion=$row['opinion'];
if($count==0)
{
mysql_query("update debates set $name=$name+1 where id='$id'");
mysql_query("insert into Voting_IP (mes_id_fk,ip_add,opinion) values ('$id','$ip','$name')");
}
else if($count==1)
{
if(!strcmp($opinion,$oth_name))
{
mysql_query("update debates set $name=$name+1, $oth_name=$oth_name-1 where id='$id'");
mysql_query("update Voting_IP set opinion='$name' where mes_id_fk='$id' AND ip_add='$ip'");
}
}
$result=mysql_query("select up,down from debates where id='$id'");
$row=mysql_fetch_array($result);
$up_value=$row['up'];
$down_value=$row['down'];
$total=$up_value+$down_value;

$up_per=($up_value*100)/$total;
$down_per=($down_value*100)/$total;
?>
<div style="margin-bottom:10px">
<b>Public Opinion</b> ( <?php echo $total; ?> total)
</div>
<table width="300px">

<tr>
<td width="15px"></td>
<td width="30px"><?php echo round($up_per,2); ?></td>
<td width="240px"><div id="greebar" style="width:<?php echo $up_per; ?>%"></div></td>
</tr>

<tr>
<td width="15px"></td>
<td width="30px"><?php echo round($down_per,2); ?></td>
<td width="240px"><div id="redbar" style="width:<?php echo $down_per; ?>%"></div></td>
</tr>

</table>

<?php

}
?>
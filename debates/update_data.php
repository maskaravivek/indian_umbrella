<?php
include('config.php');
if(isSet($_POST['content']))
{
$content=$_POST['content'];
$debate=2;
$user="pro";
mysql_query("insert into comments(debate_id,user_type,comment) values ('$debate','$user','$content')");
$sql_in= mysql_query("SELECT * FROM comments WHERE debate_id='$debate' order by comment_id desc");
$r=mysql_fetch_array($sql_in);
$msg=$r['comment'];
$msg_id=$r['comment_id'];
}

?>


<li class="bar<?php echo $msg_id; ?>">
<div align="left">
<span style=" padding:10px"><?php echo $msg; ?> </span>
<span class="delete_button"><a href="#" id="<?php echo $msg_id; ?>" class="delete_update">X</a></span>
</div>
</li>
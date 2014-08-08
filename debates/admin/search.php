<?php
include('../config.php');
if($_POST)
{

$q=$_POST['searchword'];

$sql_res=mysql_query("select * from members where name like '%$q%' or userid like '%$q%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$name=$row['name'];
$email=$row['email'];
$userid=$row['userid'];
$fname=$row['fname'];
$lname=$row['lname'];
$img=$row['profile_pic'];

$re_name='<b>'.$q.'</b>';

$final_name = str_ireplace($q, $re_name, $name);


?>
<div class="display_box" align="left">

<img src="<?php echo $img; ?>" style="width:25px; float:left; margin-right:6px" /><?php echo $final_name; ?><br/>
<span style="font-size:9px; color:#999999"><?php echo $email; ?></span></div>



<?php
}

}
else
{

}


?>

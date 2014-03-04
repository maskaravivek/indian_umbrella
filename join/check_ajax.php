<?php

include('../debates/config.php');


if(isset($_POST['username']) && isset($_POST['password']))
{
$username = $_POST['username'];
$password = md5($_POST['password']);
$username = mysql_real_escape_string($username);
$sql_check = mysql_query("SELECT id FROM members WHERE userid='$username' AND password='$password'");
if(mysql_num_rows($sql_check))
{
echo '<font color="green"><STRONG>'.$username.'</STRONG> signed in.</font>';
}
else
{
echo 'Not OK';
}

}

?>
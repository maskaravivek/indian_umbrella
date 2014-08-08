<?php 
include 'config.php';
if( isset($_POST['username'])  && isset($_POST['password']) )
{
$userid = $_POST['username'];
$password = md5($_POST['password']);
if(!empty($userid) && !empty($password))
{
$sql="SELECT id,name, userid FROM members WHERE userid='$userid' AND password='$password' AND validate='1'";
$query_run = mysql_query($sql);
$no_of_rows = mysql_num_rows($query_run); 
if($no_of_rows==0) {echo "Invalid username and password combination";}
else if($no_of_rows==1){ 
$row=mysql_fetch_array($query_run);
$id=$row['id'];
$username=$row['userid'];
$name=$row['name'];
$_SESSION['user_id']=$id;
$_SESSION['name']=$name;
header('Location:'.$current_file);

}
else {echo "You need to supply a username and password.";}
}}
?>
<form action="<?php echo $current_file;?>" method="POST" id="login_form">
<input type="text" name="username" placeholder="username"><br/><input type="password" name="password" placeholder="password">
<br><a href="forgotpass.php">Forgot Password</a><input type="submit" value="Log in">
</form>
<a href="signup.php">Not a member? Sign Up</a>

<?php session_start();
if(isset($_GET['url']))
$abc=$_GET['url'];
else
$abc='index.php';
include '../config.php';
if( isset($_POST['username'])  && isset($_POST['password']) )
{
$userid = $_POST['username'];
$password = md5($_POST['password']);
if(!empty($userid) && !empty($password))
{
$sql="SELECT id,name, userid FROM members WHERE userid='$userid' AND password='$password' AND validate='1'";
$query_run = mysql_query($sql);
$no_of_rows = mysql_num_rows($query_run); 
if($no_of_rows==0) {
echo "Invalid username and password combination";
}
else if($no_of_rows==1){ 
$row=mysql_fetch_array($query_run);
$id=$row['id'];
$username=$row['userid'];
$name=$row['name'];
$_SESSION['user_id']=$id;
$_SESSION['name']=$name;
header("Location: ".$abc);
}
else {echo "You need to supply a username and password.";}
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
    
<!-------------analytics----------------->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43647771-1', 'theindianumbrella.com');
  ga('send', 'pageview');

</script>

<!------------------analtics end----------------->


		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>The Indian Umbrella Admin</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
		
<link rel="stylesheet" href="../css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/formee-style.css" type="text/css" media="screen" />
		<script src="js/jquery-ui-1.8.1.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				$("#content .grid_5, #content .grid_6").sortable({
					placeholder: 'ui-state-highlight',
					forcePlaceholderSize: true,
					connectWith: '#content .grid_6, #content .grid_5',
					handle: 'h2',
					revert: true
				});
				$("#content .grid_5, #content .grid_6").disableSelection();
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>

		<h1 id="head">The Indian Umbrella</h1>
		
		<ul id="navigation">
			<li><a href="index.php">Overview</a></li>
			<li><a href="manage.php">Debates</a></li>
			<li><a href="users.php">Registered Users</a></li>
		</ul>

			<div id="content" class="container_16 clearfix">
			<h3>Admin Login</h3>
			<form method="post" class="formee" action="login.php?url=<?php echo $abc; ?>">
			<div class="grid-6-12">
<label>Username<em class="formee-req">*</em></label><input type="text" name="username" title="Enter your username" ><br>
</div>
<div class="grid-6-12">
<label>Password<em class="formee-req">*</em></label><input type="password" name="password" title="Enter your password" ><br>
</div>
<input class="right" name="submit" id="s9" type="submit"  value="Submit"/> 
			</form>
			</div>
		
	</body>
</html>
<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=email.php");
}
else
header("Location: login.php?url=email.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>The Indian Umbrella Admin</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
<link type="text/css" rel="stylesheet" href="jquery.rte.css" />
<style type="text/css">
body, textarea {
    font-family:sans-serif;
    font-size:12px;
}
</style>
	 <script type="text/javascript">
    function myfunc2() {
    var txtbox = document.getElementById("test");
    var value = txtbox.value;
	alert(value);
    }
    </script>
	<link rel="stylesheet" href="../css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../css/formee-style.css" type="text/css" media="screen" />
	</head>
	<body>

	<h1 id="head">The Indian Umbrella<span style="float:right;">Welcome, <?php echo $name;?> <a href="logout.php">Logout</a></span></h1>
	<ul id="navigation">
			<li><a href="index.php">Overview</a></li>
			<li><a href="manage.php">Debates</a></li>
			<li><a href="users.php">Registered Users</a></li>
		</ul>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Send out a mail to your subscribers</h2>
					<?php
include '../config.php';
	if(isset($_POST['email_box'])){
	$title=$_POST['title'];
	$mail = $_POST['email_box'];
	if(!empty($mail)){
		
		//$adminid = $_SESSION['user'];
		$query = mysql_query("SELECT Email FROM subscription");
		//$db_query = mysql_query("INSERT INTO mail (message,admin_id) VALUES($mail,$adminid)");
		if(!$query /*|| !$db_query*/){?><div class="formee-msg-error"><h4>Your email could not be sent. We are sorry for the inconvenience</h4></div><?php }
		else
		{
			$i = 0;
			while($row = mysql_fetch_assoc($query)){
				$to = $row['Email'];
				$subject = $title;
				$message = "<html><body>".$mail."</body></html>";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
				$headers .= 'From: <theindianumbrella@gmail.com>' . "\r\n";
				mail($to,$subject,$message,$headers);
				$i++;
			}
			?><div class="formee-msg-success"><h4>Email sent successfully to <?php echo $i; ?> subscribers.</h4></div><?php
		}
	}
		
	else{ ?><div class="formee-msg-error"><h4>You can't leave out the email body empty!</h4></div><?php }	
		
	}
	
	
	
	
	?>
					<form method="post" class="formee" id="test" action="email.php" >
					<div class="grid-12-12">
<label>Subject<em class="formee-req">*</em></label><input type="text" id="name_Req" name="title" ><br>
</div>
					<p>
        <textarea name="email_box" id="test" class="rte2"></textarea>
    </p>
	<input type="submit" value="Send"/>
					</form>
					
				</div>

				
			</div>
		
		<div id="foot">
					<a href="#">Contact Me</a>
		</div>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.rte.js"></script>
<script type="text/javascript" src="jquery.rte.tb.js"></script>
<script type="text/javascript" src="jquery.ocupload-1.1.4.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var arr = $('.rte1').rte({
		css: ['default.css'],
		controls_rte: rte_toolbar,
		controls_html: html_toolbar
	});

	$('.rte2').rte({
		css: ['default.css'],
		width: 940,
		height: 300,
		controls_rte: rte_toolbar,
		controls_html: html_toolbar
	}, arr);
});
</script>
	</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login</title>

<link href="style.css" rel="stylesheet" />
<link href="css/style1.css" rel="stylesheet" />
<script type="text/javascript" src="jquery.min1.js"></script>
<script type="text/javascript" src="js/jquery.easyAccordion.js"></script>
<script type="text/javascript" src="js/utility.js"></script>
<link href="css/remarks.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">

<div id="logo"><img src="images/logo.png" /></div>
    <div class="clear"></div>

<?php
include 'config.php';
if(isset($_POST['userid']) && isset($_POST['password']) && isset($_POST['new_password']) ){
	$userid = $_POST['userid'];
	$password = md5($_POST['password']);
	$new_password = md5($_POST['new_password']);
	
	if(!empty($userid) && !empty($password) && !empty($new_password) ){
		$query = mysql_query("SELECT * FROM members WHERE userid = '$userid' AND password = '$password' ");
		if(!$query){echo '<p style="margin-left:30px;color:red;">Query failed.Please try again.</p>';}
		else{
			if(mysql_num_rows($query) == 0){echo '<p style="margin-left:30px;color:red;">Invalid User ID/Password</p>';}
			else{
				$update = mysql_query("UPDATE members SET password = '$new_password' WHERE userid = '$userid' ");
				if(!$update){echo '<p style="margin-left:30px;color:red;">Password coyuld not be changed.Please try again.</p>';}
				else{echo '<p style="margin-left:30px;color:blue;">Password has been changed</p>';}
			}
		}
		
	}
	
	else {echo '<p style="margin-left:30px;color:red;">Fill in all the fields</p>';}
	
}
else{echo mysql_error();}




?>





	<div id="container">       
    <form method="POST" action="updatepass.php">
    
    <label>User ID</label>
    <input type="text" id="username" name="userid">

    <label>Old password</label>
    <input type="password" id="password" name="password">
    
	<label>New password</label>
    <input type="password" id="password" name="new_password">
   
    <div id="lower">
    <input type="submit" value="Update">
    </div><!--/ lower-->
    </form>
    </div>
    
    
</div>

<div id="footer">
				<div class="wrapper">
					<center><ul id="icons">
						<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Delicious"><img src="images/icon2.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Stumble Upon"><img src="images/icon3.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon4.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon5.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Reddit"><img src="images/icon6.png" alt=""></a></li>
					</ul></center>
				</div>
    	<center>Copyrights @ The Indian Umbrella 2013 <br /> * <a href="contact.html">Contact</a> * <a href=#>Privacy</a> * <a href=#>Terms of use</a> * <a href=#>Legal Disclaimer</a> * <a href=#>Help</a> *</center>   
</div>     
        
</body>
</html>
    

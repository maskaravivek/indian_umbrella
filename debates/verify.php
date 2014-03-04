<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sign up</title>
	
    <link href="style.css" rel="stylesheet" />
    <link href="css/style1.css" rel="stylesheet" />
    <link href="css/style2.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />
    
    <script>
		function checkEmail(){	
			var inputvalue = document.forms["signupform"]["email"].value;
			var pattern = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
			if(pattern.test(inputvalue)){}
			else{   
				alert("Invalid email address");
				return false; 
			}
			
	}
	</script>
    
</head>

<body>
<div id="wrapper">

	
    
    <div id="logo"><img src="images/logo.png" /></div>

	<div class="clear"></div>
<?php
include 'config.php';
			
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
	// Verify data
	$email = mysql_escape_string($_GET['email']); // Set email variable
	$hash = mysql_escape_string($_GET['hash']); // Set hash variable
				
	$search = mysql_query("SELECT email, hash, active FROM members WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
	$match  = mysql_num_rows($search);
				
	if($match > 0){
		// We have a match, activate the account
		mysql_query("UPDATE members SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
		echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
	}else{
		// No match -> invalid url or account has already been activated.
		echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
	}
				
}else{
	// Invalid approach
	echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
}


		
	    ?>
    
    
    
        
    <div class="clear"></div>
    
    <br /><br /><br /><br />
    
    
</div>    
    
<br/><br />

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
    	<center>Copyrights @ The Indian Umbrella 2013 <br />* <a href="contact.html">Contact</a> * <a href=#>Privacy</a> * <a href=#>Terms of use</a>* <a href=#>Legal Disclaimer</a> * <a href=#>Help</a> *   
</div>     
    


<script>
window.onload = function(){
	document.getElementById("male").setAttribute("checked");
}
</script>


   
 		
</body>
</html>

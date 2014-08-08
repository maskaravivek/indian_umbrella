<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forgot Password</title>
	  <link rel="shortcut icon" href="http://theindianumbrella.com/debates/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="css/custom_heading.css" />
    <link href="style.css" rel="stylesheet" />
    <link href="css/style1.css" rel="stylesheet" />
    <link href="css/style2.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />
    <link href="css/footer_nav.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
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
  <link rel="stylesheet" type="text/css" href="css/default_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/header_nav.css" />
		<script src="js/modernizr.custom_nav.js"></script>
		<style>
		a{text-decoration:none;}
		</style>
</head>

<body>
<div id="wrapper">
<header class="ct-header">
				<div class="ct-inner ct-cf">
				<div style="width:100%">
				<div class="ct-nav-wrapper">
						<nav  class="ct-nav-main">
						   <ul>
								<li><a href="http://www.theindianumbrella.com">Home</a></li>
								<li><a href="http://www.theindianumbrella.com/debates">Debates</a></li>
								<li><a href="http://www.theindianumbrella.com/perspectives">Perspectives</a></li>
								<li><a href="http://www.theindianumbrella.com/interviews">Interviews</a></li>
								<li><a href="http://www.theindianumbrella.com/join">Join</a></li>
								<li><a href="http://www.theindianumbrella.com/contact.html">Contact</a></li>
							</ul>
						</nav>
					
						<div style="margin-top:-100px;float:right;margin-left:150px">
							<a style=":hover {text-decoration:none;}" href="../index.php" rel="home"><h1 id="logo_index">The Indian Umbrella</h1></a>
						</div>
						</div>
						</div>
						<div style="width:100%;float:right; margin-top:30px;margin-bottom:20px;">
					<div class="ct-header-items-right">
					
						
					<ul style="margin-top:0px; list-style-type: none;" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="images/Facebook.png"></a></li>
							<li><a href="http://www.twitter.com/indianumbrella"><img src="images/Twitter.png"></a></a></li>
							<li><a href="https://plus.google.com/u/0/104590234648482562614"><img src="images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
	<div class="clear"></div>
	<div style="padding:10px;background-color:#aaa;"><h3 style="padding-left:10px;text-transform:none;font-size:20px;font-family: 'Open Sans', sans-serif;">Forgot Password</h3></div> 

<?php 

include 'config.php';
if(isset($_POST['userid']) && isset($_POST['email'])){
    $userid = $_POST['userid'];
    $email = $_POST['email'];
	if(!empty($userid) && !empty($email)){
		$query = mysql_query("SELECT email FROM members WHERE userid = '$userid' AND email = '$email' ");
		if(!$query){echo '<div class="formee-msg-error"><h4>Oops..There was some technical fault.Please try again</h4></div> ';}
		else{
			if(mysql_num_rows($query) == 0){echo '<div class="formee-msg-error"><h4>No such username was found</h4></div>';}
			else{
				$array = mysql_fetch_assoc($query);
				$email = $array['email'];
				
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	for( $i = 0; $i < 8; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
				
				$password = md5($str);
				
				$query_pass = mysql_query("UPDATE members SET password = '$password' WHERE userid = '$userid' ");
				if(!$query_pass){echo '<div class="formee-msg-error"><h4>Could not update password.Please try again.</h4></div>';}
				else{
					$to      = $email; // Send email to our user
					$subject = 'Reset Password'; // Give the email a subject 
					$message = '
								Your new password has been updated.
								------------------------
								Username: '.$userid.'
								------------------------
								Password: '.$str.'
								------------------------';
								
								$headers = 'From:theindianumbrella@gmail.com' . "\r\n"; // Set from headers
								mail($to, $subject, $message, $headers); // Send our email
								
								echo '<div class="formee-msg-success"><h4>A mail with your new password has been sent to '.$email.'</h4></div>';
				}
				
			}
			
		}
	}
	else{echo '<div class="formee-msg-error"><h4>Fill in your username</h4></div>';}

}
else{echo mysql_error();}
?>



	<form method="post" class="formee" id="test" action="forgotpass.php">
<fieldset>

	

	<legend>Forgot Password</legend>
	
    
    
    
	<div class="grid-6-12">
	<label>Enter your username<em class="formee-req">*</em></label><input type="text" id="name_Req" name="userid" title="Required! enter your userid" ><br>
	</div>
    <div class="grid-6-12">
    <label>Enter your email id<em class="formee-req">*</em></label><input type="text" id="name_Req" name="email" title="Required! enter your emailid" ><br>
	</div>
    </fieldset>
    <div class="grid-12-12">
    <input class="right" name="submit" id="s9" type="submit"  value="Submit" /> 
	</div>

    
    </form>
    


	<div class="clear"></div>
  <footer class="ct-footer">
			
			<div class="ct-inner ct-cf">
				<nav class="ct-cf">
					<ul>
						<li><a href="http://www.theindianumbrella.com">Home</a></li>
						<li><a href="http://www.theindianumbrella.com/debates">Debates</a></li>
						<li><a href="http://www.theindianumbrella.com/perspectives">Perspectives</a></li>
						<li><a href="http://www.theindianumbrella.com/interviews">Interviews</a></li>
					</ul>
					<ul>
						<li><a href="http://www.theindianumbrella.com/about.html">About</a></li>
						<li><a href="http://www.theindianumbrella.com/team.html">Team</a></li>
						<li><a href="http://www.theindianumbrella.com/join">Join Us</a></li>
						<li><a href="http://www.theindianumbrella.com/contact.html">Contact</a></li>
					</ul>
					<ul>
						<li><a href="http://www.theindianumbrella.com/privacypolicy.html">Privacy Policy</a></li>
						<li><a href="http://www.theindianumbrella.com/termsofuse.html">Terms of Use</a></li>
						<li><a href="http://www.theindianumbrella.com/legaldisclaimer.html">Legal Disclaimer</a></li>
						<li><a href="http://www.theindianumbrella.com/license.html">License</a></li>
					</ul>
				</nav>
				<div class="ct-items ct-cf">
					
					<div class="ct-item ct-copyright">
						<span style="color:#aaa">&copy; The Indian Umbrella 2013 by</span><br/> 
						<a href="http://theindianumbrella.com" style="color:#aaa">The Indian Umbrella</a><br/>
						
					</div>	
				</div>
			</div>
		</footer>
    
    
</div>

        
</body>
</html>
    

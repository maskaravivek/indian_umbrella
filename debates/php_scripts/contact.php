<html>
<head>
<title>Contact Us</title>
  <link rel="shortcut icon" href="http://theindianumbrella.com/debates/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="../css/default_nav.css" />
    	<link rel="stylesheet" type="text/css" href="../css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="../css/header_nav.css" />
		<link href="../style.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/formee-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/formee-style.css" type="text/css" media="screen" />
	<link href="../css/style_sign_up.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.min_sign.js"></script>
<script language="javascript" type="text/javascript" src="../js/vpb_script.js"></script>
<style>
a {text-decoration:none;}
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
								<li><a href="http://theindianumbrella.com/">Home</a></li>
								<li><a href="http://theindianumbrella.com/debates/">Debates</a></li>
								<li><a href="http://theindianumbrella.com/blogs/#sthash.NfjnLqfd.dpbs">Perspectives</a></li>
								<li><a href="http://theindianumbrella.com/interviews/">Interviews</a></li>
								<li><a href="http://theindianumbrella.com/join/">Join</a></li>
								<li><a href="http://theindianumbrella.com/contact.html">Contact</a></li>
							</ul>
						</nav>
					
						<div style="margin-top:-100px;float:right;margin-left:150px">
							<a href="http://www.theindianumbrella.com" rel="home"><h1 id="logo_index">The Indian Umbrella</h1></a>
						</div>
						</div>
						</div>
						<div style="width:100%;float:right;margin-bottom:20px;">
					<div class="ct-header-items-right">
					
						
					<ul style="margin-top:20px" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../images/Facebook.png"></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../images/Twitter.png"></a></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
            <?php include 'config.php';
			
			
				$name = mysql_real_escape_string($_POST['name']);
				$email = mysql_real_escape_string($_POST['email']);
				$message = mysql_real_escape_string($_POST['message']);
				if(!empty($name) && !empty($email) && !empty($message) ){
					$to = "theindianumbrella@gmail.com";
                    $subject = "Contact message";
                    $headers = "From : ".$name." <".$email.">";
                    mail($to,$subject,$message,$headers);
					?>
                        <div class="formee-msg-success"><h4>Thank you for your message. We will get back to you soon!</h4></div>
                    <?php 
                    
				}
				
				else{?><div class="formee-msg-error"><h4>Fill in all the fields.</h4></div> <?php }
				
			
			
			?>

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
						<a style="color:#aaa" href="http://theindianumbrella.com">The Indian Umbrella</a><br/>
						
					</div>	
				</div>
			</div>
		</footer></div>
			
</body>
</html>
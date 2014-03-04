<?php
session_start();
session_destroy();
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="css/default_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/header_nav.css" />
		<link href="style.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />
	<link href="css/style_sign_up.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min_sign.js"></script>
<script language="javascript" type="text/javascript" src="js/vpb_script.js"></script>
</head>
<body>
<div id="wrapper">
<header class="ct-header">
				<div class="ct-inner ct-cf">
				<div style="width:100%">
				<div class="ct-nav-wrapper">
						<nav  class="ct-nav-main">
						   <ul>
								<li><a href="/codrops/category/tutorials/">Home</a></li>
								<li><a href="/codrops/category/articles/">Debates</a></li>
								<li><a href="/codrops/category/playground/">Blog</a></li>
								<li><a href="/codrops/category/blueprints/">Interviews</a></li>
								<li><a href="/codrops/collective/">Join</a></li>
								<li><a href="/codrops/collective/">Contact</a></li>
							</ul>
						</nav>
					
						<div style="margin-top:-100px;float:right;margin-left:150px">
							<a href="../index.php" rel="home"><h1 id="logo_index">The Indian Umbrella</h1></a>
						</div>
						</div>
						</div>
						<div style="width:100%;float:right;margin-bottom:20px;">
					<div class="ct-header-items-right">
					
						
					<ul style="margin-top:20px" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="images/Facebook.png"></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="images/Twitter.png"></a></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
			<?php include 'config.php';
				
				
				
				function js_redirect($url, $seconds)
				{
					echo "<script language=\"JavaScript\">\n";
					echo "<!-- hide code from displaying on browsers with JS turned off\n\n";
					echo "function redirect() {\n";
					echo "window.parent.location = \"" . $url . "\";\n";
					echo "}\n\n";
					echo "timer = setTimeout('redirect()', '" . ($seconds*1000) . "');\n\n";
					echo "-->\n";
					echo "</script>\n";

					return true;
				}?>
				
				<div class="formee-msg-error"><h4>You have been successfully logged out.Redirecting to home page...</h4></div>
			<?php
				js_redirect("index.php",5);
			?>
			
				
			
			
			

			<footer class="ct-footer">
			
			<div class="ct-inner ct-cf">
				<nav class="ct-cf">
					<ul>
						<li><a href="/codrops/category/tutorials/">Home</a></li>
						<li><a href="/codrops/category/articles/">Debates</a></li>
						<li><a href="/codrops/category/playground/">Blogs</a></li>
						<li><a href="/codrops/category/blueprints/">Interviews</a></li>
					</ul>
					<ul>
						<li><a href="/codrops/about/">About</a></li>
						<li><a href="/codrops/contact/">Team</a></li>
						<li><a href="/codrops/archives/">Join Us</a></li>
						<li><a href="/codrops/deals/">Contact</a></li>
						<li><a href="/codrops/advertise/">Subscribe</a></li>
					</ul>
					<ul>
						<li><a href="/codrops/privacy-policy/">Privacy Policy</a></li>
						<li><a href="/codrops/licensing/">Terms of Use</a></li>
						<li><a href="/codrops/credits/">Legal Disclaimer</a></li>
						<li><a href="/codrops/impressum/">Lisence</a></li>
					</ul>
				</nav>
				<div class="ct-items ct-cf">
					
					<div class="ct-item ct-copyright">
						<span>&copy; The Indian Umbrella 2013 by</span><br/> 
						<a href="http://theindianumbrella.com">The Indian Umbrella</a><br/>
						
					</div>	
				</div>
			</div>

		</footer></div>
			
</body>
</html>
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
<title>Application Form Marketing</title>
  <link rel="shortcut icon" href="http://theindianumbrella.com/debates/favicon.ico" type="image/x-icon" />
<style>
blockquote {
font-family: Georgia, serif;
font-size: 14px;
font-style: italic;
margin: 0.25em 0;
padding: 0.25em 40px;
line-height: 1.45;
position: relative;
color: #383838;
}

h1, h2, h3 {
	font-family: 'Trebuchet MS', 'Helvetica Neue', Arial, Sans-serif;
	font-weight: Bold; 		
	color: #444;	
}
h1 {
	font-size: 2.2em;		
}
#header {
	position: relative;
	height: auto;	
	color: #fff;	
	padding: 0;	
	margin-top: 0;
}
#header h1#logo-text {
	margin: 0; padding: 0;
	font: 36px 'Trebuchet MS', 'Helvetica Neue', Arial, Sans-serif;
	letter-spacing: -3px;
	text-decoration: none;
	color: #fff;
	/* change the values of top and left to adjust the position of the logo*/
	
}
#logo_index{
	font-size:64px;
	font-weight:normal;
	text-align:center;
	text-decoration:none;
	text-shadow:1px 1px 2px #000000;
	font-family: 'Arizonia', cursive;
	line-height:50px;
	margin:10px;
	text-transform:none; 
}	
	
</style>
<link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
<link href="../debates/css/footer_nav.css" rel="stylesheet" />
<link href='../debates/css/style_tabs.css' rel='stylesheet' type='text/css' />
		  <link rel="stylesheet" type="text/css" href="../debates/css/rounded_list.css" />
		<script type='text/javascript' src='../debates/js/jquery1.3.js'></script>
		
		<link href='../debates/css/tabbedContent.css' rel='stylesheet' type='text/css' />
		<script src="../debates/js/tabbedContent.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../debates/css/default_nav.css" />
		<link rel="stylesheet" type="text/css" href="../debates/css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="../debates/css/header_nav.css" />
		<link href="../debates/style.css" rel="stylesheet" />
<link href="../debates/css/style1.css" rel="stylesheet" />
<link href="../debates/css/style2.css" rel="stylesheet" />
<script type="text/javascript" src="../debates/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="../debates/js/formee.js"></script>
<script type="text/javascript" src="../debates/js/protoform.js"></script>
<script type="text/javascript" src="../debates/js/prototype-nw.js"></script>
<link rel="stylesheet" href="../debates/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../debates/css/formee-style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika' rel='stylesheet' type='text/css'>
<script type="text/javascript">
Event.observe(window,"load",function() {
     
	new Protoform('test');     
	  
});
</script>
<link rel="stylesheet" href="../debates/css/custom_heading.css" />
</head>
<body>

<div id="wrapper"><header class="ct-header">
				<div class="ct-inner ct-cf">
				<div style="width:100%">
				<div class="ct-nav-wrapper">
						<nav  class="ct-nav-main">
						   <ul>
								<li><a style="text-decoration:none;" href="/codrops/category/tutorials/">Home</a></li>
								<li><a style="text-decoration:none;" href="/codrops/category/articles/">Debates</a></li>
								<li><a style="text-decoration:none;" href="/codrops/category/playground/">Blog</a></li>
								<li><a style="text-decoration:none;" href="/codrops/category/blueprints/">Interviews</a></li>
								<li><a style="text-decoration:none;" href="/codrops/collective/">Join</a></li>
								<li><a style="text-decoration:none;" href="/codrops/collective/">Contact</a></li>
							</ul>
						</nav>
					
						<div style="margin-top:-50px;float:right;margin-left:150px">
							<a style="text-decoration:none;" href="../index.php" rel="home"><h1 id="logo_index">The Indian Umbrella</h1></a>
						</div>
						</div>
						</div>
						<div style="width:100%;float:right;margin-bottom:20px;">
					<div class="ct-header-items-right">
					
						
					<ul style="margin-top:20px;list-style-type: none;" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../debates/images/Facebook.png"></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../debates/images/Twitter.png"></a></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../debates/images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
            <div style="padding:10px;background-color:#aaa;"><h3 style="text-transform:none;font-size:20px;font-family: 'Signika', sans-serif;">Unsubscribe</h3></div>
<div>

<?php
include 'config.php';
$email=$_GET['email'];
$hash=$_GET['hash'];
$query=mysql_query("Select * from subscription where Email='$email' AND hash='$hash'");
$no=mysql_num_rows($query);
if($no==1)
{
mysql_query("DELETE from subscription where Email='$email'"); ?>
<div class="formee-msg-success"><h4>You have been successfully unsubscribed.</h4></div>
<?php }
else { ?>
<div class="formee-msg-error"><h4>You are not subscribed.</h4></div>
<?php }?>

</div>
    
    
        
    <div class="clear"></div>
    
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
						<li><a href="/codrops/impressum/">License</a></li>
					</ul>
				</nav>
				<div class="ct-items ct-cf">
					
					<div class="ct-item ct-copyright">
						<span>&copy; The Indian Umbrella 2013 by</span><br/> 
						<a style="text-decoration:none" href="http://theindianumbrella.com">The Indian Umbrella</a><br/>
						
					</div>	
				</div>
			</div>

		</footer> 
</div>    
         

</body>
</html>
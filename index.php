	<?php
	$mysql_hostname = "theindumb.db.11621953.hostedresource.com";
$mysql_user = "theindumb";
$mysql_password = "vvk@0FF1cer";
$mysql_database = "theindumb";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
//email signup ajax call
if($_GET['action'] == 'signup'){
	$email = mysql_real_escape_string($_POST['signup-email']);
	if(empty($email)){
		$status = "error";
		$message = "You did not enter an email address!";
	}
	else if(!preg_match('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/', $email)){ //validate email address - check if is a valid email address
			$status = "error";
			$message = "You have entered an invalid email address!";
	}
	else {
		$existingSignup = mysql_query("SELECT * FROM subscription WHERE Email='$email'");   
		if(mysql_num_rows($existingSignup) < 1){
			$insertSignup = mysql_query("INSERT INTO subscription (Email) VALUES ('$email')");
			if($insertSignup){ //if insert is successful
				$status = "success";
				$message = "You have been signed up!";	
			}
			else { //if insert fails
				$status = "error";
				$message = "Ooops, Theres been a technical error!";	
			}
		}
		else { //if already signed up
			$status = "error";
			$message = "This email address has already been registered!";
		}
	}
	
	//return json response
	$data = array(
		'status' => $status,
		'message' => $message
	);
	
	echo json_encode($data);
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
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


    
        <title>The Indian Umbrella</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="" />
        <meta name="keywords" content=""/>
		<link rel="shortcut icon" href="http://devilsnarewp7.com/vg/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="debates/css/style_index.css" type="text/css" media="screen"/>
		<script src="debates/js/cufon-yui.js" type="text/javascript"></script>
		<script src="debates/js/Aller.font.js" type="text/javascript"></script>
		<link rel="stylesheet" type="text/css" href="debates/css/default.css" />
		<link rel="stylesheet" type="text/css" href="debates/css/component.css" />
		<link rel="stylesheet" type="text/css" href="debates/css/subscribe.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
<script src="debates/js/jquery.classysocial.js"></script>
<link rel="stylesheet" type="text/css" href="debates/css/jquery.classysocial.css" />
<script src="https://www.google.com/jsapi" type="text/javascript"></script>
<script type="text/javascript">
	google.load('jquery', '1.4.1');
</script>

<script type="text/javascript">
var q=$.noConflict();
q(document).ready(function(){
	q('#newsletter-signup').submit(function(){
		
		//check the form is not currently submitting
		if(q(this).data('formstatus') !== 'submitting'){
		
			//setup variables
			var form = q(this),
				formData = form.serialize(),
				formUrl = form.attr('action'),
				formMethod = form.attr('method'), 
				responseMsg = q('#signup-response');
			
			//add status data to form
			form.data('formstatus','submitting');
			
			//show response message - waiting
			responseMsg.hide()
					   .addClass('response-waiting')
					   .text('Please Wait...')
					   .fadeIn(200);
			
			//send data to server for validation
			q.ajax({
				url: formUrl,
				type: formMethod,
				data: formData,
				success:function(data){
					
					//setup variables
					var responseData = jQuery.parseJSON(data), 
						klass = '';
					
					//response conditional
					switch(responseData.status){
						case 'error':
							klass = 'response-error';
						break;
						case 'success':
							klass = 'response-success';
						break;	
					}
					
					//show reponse message
					responseMsg.fadeOut(200,function(){
						q(this).removeClass('response-waiting')
							   .addClass(klass)
							   .text(responseData.message)
							   .fadeIn(200,function(){
								   //set timeout to hide response message
								   setTimeout(function(){
									   responseMsg.fadeOut(200,function(){
									       q(this).removeClass(klass);
										   form.data('formstatus','idle');
									   });
								   },3000)
								});
					});
				}
			});
		}
		
		//prevent form from submitting
		return false;
	});
});
</script>
		<script src="debates/js/modernizr.custom.js"></script>
		<script src="debates/js/modernizr.custom1.js"></script>
		<script type="text/javascript">
			Cufon.replace('ul.oe_menu div a',{hover: true});
			Cufon.replace('h1,h2,.oe_heading');
		</script>
		
        <style type="text/css">
			span.reference{
				position:fixed;
				left:0px;
				bottom:0px;
				background:#000;
				width:100%;
				font-size:10px;
				line-height:20px;
				text-align:right;
				height:20px;
				-moz-box-shadow:-1px 0px 10px #000;
				-webkit-box-shadow:-1px 0px 10px #000;
				box-shadow:-1px 0px 10px #000;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				margin-right:10px;
				
			}
			span.reference a:hover{
				color:#ddd;
			}
			.bg_img img{
				width:100%;
				position:fixed;
				top:0px;
				left:0px;
				z-index:-1;
			}
			h1{
				font-size:64px;
				text-align:right;
				position:absolute;
				right:40px;
				top:20px;
				font-weight:normal;
				/*text-shadow:  0 0 3px #0096ff, 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #0096ff, 0 0 70px #0096ff, 0 0 80px #0096ff, 0 0 100px #0096ff, 0 0 150px #0096ff;
			*/}
			#logo_index span{
				display:block;
				font-size:22px;
				position:absolute;
				right:20px;
			}
			h2{
				position:absolute;
				top:220px;
				left:50px;
				font-size:28px;
				font-weight:normal;
				/*text-shadow:  0 0 3px #f6ff00, 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #f6ff00, 0 0 70px #f6ff00, 0 0 80px #f6ff00, 0 0 100px #f6ff00, 0 0 150px #f6ff00;
*/}
#logo_index{
	font-size:84px;
	font-weight:normal;
	text-decoration:none;
	text-shadow:3px 3px 5px #000000;
	font-family: 'Arizonia', cursive;
	line-height:50px;
	margin-top:50px;
	margin-right:15px;
	float:right;
	text-transform:none; 
}
		</style>
    </head>

    <body>

		<div class="bg_img"><img style="opacity:0.3;" src="debates/images/bg1.jpg" alt="background" /></div>
		<p id="logo_index">The Indian Umbrella</p>
		

		<div class="oe_wrapper" style="float:left;">
			<div id="oe_overlay" class="oe_overlay"></div>
			<ul id="oe_menu" class="oe_menu">
				<li ><a style="font-size:17px;" href="">About</a>
					<div>
						<p style="color:#000000;width:60%;float:left;font-size:14px;text-transform: none;"><strong>The Indian Umbrella</strong> is a network of growing individuals with passion about debate and debate related activities. The objective of The Indian Umbrella is to create a platform to share knowledge through conferences, online debating, interviews of distinguished people from various sectors.<br /><a href="#" class="more">Read more</a></p>
						<ul style="float:left;margin-left:25px;">
							<li class="oe_heading">Team</li>
							<li><a href="about.html">Content Development</a></li>
							<li><a href="about.html">Lead Debators</a></li>
							<li><a href="about.html">Bloggers</a></li>
							<li><a href="about.html">Technical</a></li>
						</ul>
					</div>
				</li>
				<li><a style="font-size:17px;" href="">Debates</a>
					<div style="left:-111px;"><!-- -112px -->
						<ul class="oe_full"><li class="oe_heading">Ongoing debates</li>
							 <?php
$sql=mysql_query("select * from debates WHERE type='current' ORDER BY id DESC LIMIT 5");
while($row=mysql_fetch_array($sql))
{
$topic=$row['issue'];
$debate_id=$row['id'];

 ?>
 <li><a href="<?php echo "debates/current_debate.php?id=".$debate_id;?>"><?php echo $topic; ?></a></li>
 <?php
 }
 ?>
						</ul>
						<a style="color:#000;float:right;" href="debates/index.php">Enter debate room</a>
					</div>
				</li>
				<li><a style="font-size:15px;" href="">Perspectives</a>
					<div style="left:-223px;">
						<ul class="oe_full">
							 <?php
  include('debates/rss_home.php');
  $feedlist = new rss('http://theindianumbrella.com/perspectives/feed/');
  echo $feedlist->display(5,"Latest perspectives");
 ?>
						</ul>
						<a style="color:#000;float:right;" href="perspectives/index.php">View Perspectives</a>
					</div>
					
				</li>
				<li><a style="font-size:17px;" href="">Interviews</a>
					<div style="left:-335px;">
						<ul class="oe_full">
							 <?php
  $feedlist = new rss('http://theindianumbrella.com/interviews/feed/');
  echo $feedlist->display(5,"Latest Interviews");
 ?>
						</ul>
						<a style="color:#000;float:right;" href="interviews/index.php">View all interviews</a>
					</div>
				</li>
				
			</ul>
		
		</div>
		<div class="container">
		<center>
			<div class="main">
				<div id="cbp-qtrotator" class="cbp-qtrotator">
					<div class="cbp-qtcontent">
						<img src="debates/images/1.jpg" alt="img01" />
						<blockquote>
						  <p style="text-transform:none;">The smart way to keep people passive and obedient is to strictly limit the spectrum of acceptable opinion, but allow very lively debate within that spectrum....</p>
						  <footer> Noam Chomsky, The Common Good</footer>
						</blockquote>
					</div>
					<div class="cbp-qtcontent">
						<img src="debates/images/2.jpg" alt="img02" />
						<blockquote>
						  <p style="text-transform:none;">When the debate is lost, slander becomes the tool of the loser</p>
						  <footer>Socrates</footer>
						</blockquote>
					</div>
					<div class="cbp-qtcontent">
						<img src="debates/images/3.jpg" alt="img03" />
						<blockquote>
						  <p style="text-transform:none;">Don't raise your voice, improve your argument.</p>
						  <footer>Desmond Tutu</footer>
						</blockquote>
					</div>
					<div class="cbp-qtcontent">
						<img src="debates/images/4.jpg" alt="img04" />
						<blockquote>
						  <p style="text-transform:none;">If you've got the truth you can demonstrate it. Talking doesn't prove it.</p>
						  <footer> Robert A. Heinlein</footer>
						</blockquote>
					</div>
				</div>
			</div>
			</center>
		</div>
		<div id="footer" style="float:left;width:100%;position:absolute;margin-top:475px;margin-left:75px;">
		<div style="float:left;" class="classysocial" data-picture="debates/images/share_core_square.jpg" data-google-handle="104590234648482562614" data-facebook-handle="theindianumbrella" data-twitter-handle="indianumbrella" data-email-handle="theindianumbrella@gmail.com" data-networks="facebook,twitter,google,email"></div>
<div style="float:left;margin-left:320px;margin-top:40px;">
<form id="newsletter-signup" action="?action=signup" method="post">
    <fieldset>
        <label for="signup-email">Keep updated with us</label>
        <input type="text" name="signup-email" style="width:240px;" id="signup-email" placeholder="Your email" />
        <input type="submit" id="signup-button" value="Join" />
        <p id="signup-response"></p>
    </fieldset>
</form>
</div>
		</div>
		<div class="container1">
		<nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-bottom" id="cbp-spmenu-s4">
			<h3 style="margin-top:-15px;"><a href="join/index.html">Join Us</a></h3>
			<a href="" class="link_style" style="width:58%;">© 2013 The Indian Umbrella</a>
			<a href="#" class="link_style" id="showBottom">More</a>
			<a href="termsofuse.html" class="link_style" >Terms of use</a>
			<a href="privacypolicy.html" class="link_style">Privacy Policy</a>
			<a href="legaldisclaimer.html" class="link_style">Legal disclaimer</a>
			<a href="contact.html" class="link_style">Help</a>
		</nav></div>
        <!-- The JavaScript -->
		<script>
                                    $(document).ready(function() {
                                        $(".classysocial").each(function() {
                                            new ClassySocial(this);
                                        });
                                    });
                                </script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
				var $oe_menu		= $('#oe_menu');
				var $oe_menu_items	= $oe_menu.children('li');
				var $oe_overlay		= $('#oe_overlay');

                $oe_menu_items.bind('mouseenter',function(){
					var $this = $(this);
					$this.addClass('slided selected');
					$this.children('div').css('z-index','9999').stop(true,true).slideDown(200,function(){
						$oe_menu_items.not('.slided').children('div').hide();
						$this.removeClass('slided');
					});
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('selected').children('div').css('z-index','1');
				});

				$oe_menu.bind('mouseenter',function(){
					var $this = $(this);
					$oe_overlay.stop(true,true).fadeTo(200, 0.6);
					$this.addClass('hovered');
				}).bind('mouseleave',function(){
					var $this = $(this);
					$this.removeClass('hovered');
					$oe_overlay.stop(true,true).fadeTo(200, 0);
					$oe_menu_items.children('div').hide();
				})
            });
        </script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="debates/js/jquery.cbpQTRotator.min.js"></script>
		<script>
		var m=$.noConflict();
			m( function() {
				/*
				- how to call the plugin:
				$( selector ).cbpQTRotator( [options] );
				- options:
				{
					// default transition speed (ms)
					speed : 700,
					// default transition easing
					easing : 'ease',
					// rotator interval (ms)
					interval : 8000
				}
				- destroy:
				$( selector ).cbpQTRotator( 'destroy' );
				*/

				m( '#cbp-qtrotator' ).cbpQTRotator();

			} );
		</script>
		<script src="debates/js/classie.js"></script>
		<script>
				menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
				showBottom = document.getElementById( 'showBottom' ),
				body = document.body;

			
			showBottom.onclick = function() {

				classie.toggle( this, 'active' );
				classie.toggle( menuBottom, 'cbp-spmenu-open' );
				disableOther( 'showBottom' );
				var elem = document.getElementById("showBottom");
				if (elem.innerHTML=="More") elem.innerHTML = "Less";
				else elem.innerHTML = "More";
			};
			

			function disableOther( button ) {
				
				if( button !== 'showBottom' ) {
					classie.toggle( showBottom, 'disabled' );
				}
				
			}
		</script>
    </body>
</html>
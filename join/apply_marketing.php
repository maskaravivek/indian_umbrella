<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application Form Marketing</title>
  <link rel="shortcut icon" href="http://devilsnarewp7.com/vg/favicon.ico" type="image/x-icon" />
<style>
a{text-decoration:none;}
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
#status
{
font-size:11px;
margin-left:10px;
}
.green
{
background-color:#CEFFCE;
}
.red
{
background-color:#FFD9D9;
}	
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
	
<SCRIPT type="text/javascript">
var abc=$.noConflict();
abc(document).ready(function()
{
document.getElementById('mera_submit').disabled = true;
abc("#password").change(function() 
{ 

var username = abc("#username").val();
var password = abc("#password").val();
var msgbox = abc("#status");


if(username.length > 3)
{
abc("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

abc.ajax({  
    type: "POST",  
    url: "check_ajax.php",  
    data: "username="+ username+"&password="+password,  
    success: function(msg){  
   
   abc("#status").ajaxComplete(function(event, request){ 

	if(msg == 'Not OK')
	{ abc("#username").removeClass("green");
		 abc("#username").addClass("red");
		msgbox.html(' <font color="red"> Invalid details! </font>  ');
	
	    
	}  
	else  
	{  
	     abc("#username").removeClass("red");
	    abc("#username").addClass("green");
        msgbox.html('<img src="yes.png" align="absmiddle"> <font color="Green"> Signed in! </font>  ');
		document.getElementById('mera_submit').disabled = false;
	}  
   
   });
   } 
   
  }); 

}
else
{
 abc("#username").addClass("red");
abc("#status").html('<font color="#cc0000">Enter valid User Name</font>');
}



return false;
});

});
function show_new()
        {
			if(document.getElementById('new-user').style.display=="none")
            {
			document.getElementById('new-user').style.display="block";
			document.getElementById('return').style.display="none";
			document.getElementById('mera_submit').disabled = false;
			}
			else if(document.getElementById('new-user').style.display=="block")
            {
			document.getElementById('new-user').style.display="none";
			document.getElementById('return').style.display="block";
			document.getElementById('mera_submit').disabled = true;
			}
			
		}
</SCRIPT>
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
								<li><a href="http://www.theindianumbrella.com">Home</a></li>
								<li><a href="index.php">Debates</a></li>
								<li><a href="http://www.theindianumbrella.com/perspectives">Perspectives</a></li>
								<li><a href="http://www.theindianumbrella.com/interviews">Interviews</a></li>
								<li><a href="http://www.theindianumbrella.com/join">Join</a></li>
								<li><a href="http://www.theindianumbrella.com/contact.html">Contact</a></li>
							</ul>
						</nav>
					
						<div style="margin-top:-50px;float:right;margin-left:150px">
							<a href="../index.php" rel="home"><h1 id="logo_index">The Indian Umbrella</h1></a>
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
<div>
<div class='tabbed_content'>
					<div class='tabs'>
						<div class='moving_bg'>
							&nbsp;
						</div>
						<span class='tab_item'>
							Roles & Responsibilities
						</span>
						<span class='tab_item'>
							Take Away
						</span>
					</div>
					
					<div class='slide_content'>						
						<div class='tabslider'>
							<ol class="rounded-list">
								<li><p>Generate sponsorship in cash and kind</p></li>
<li><p>Coming up with innovative ideas to be implemented to strengthen the consumer base</p></li>
<li><p>Various other online activities to help and promote the brand/ services</p></li>
<li><p>Generate Content relevant to marketing, MoUs and Marketing brochure</p></li>
<li><p>E mail Marketing - Run email campaigns and track their growth in real time</p></li>
<li><p>Social Media Marketing: Facebook, Google+, Twitter etc and Understand various trends on social media</p></li>
<li><p>Participate in conference calls, team trainings, and regularly scheduled team meetings</p></li>
<li><p>Average time commitment: 10-15 hours per week</p></li>
<li><p>Organizing annual National Debating Conferences</p></li> 
</ol>
							<ol class="rounded-list">
								<li><p>Exposure and experience to understand how online marketing works</p></li>
<li><p>Monetary Benefit: Proportionate to the benefit brought to the company</p></li>
<li><p>You will learn the ins and outs of high-paced marketing strategies in growing a startup</p></li>
<li><p>Understand analytics driven marketing where measurable campaigns are tracked and advise you on what strategies are working and which ones aren't</p></li>
<li><p>Develop soft skills, communication skills</p></li>
<li><p>Certificate of Appreciation</p></li>
<li><p>Professional Growth through Networking and Skill Development</p></li>
<li><p>It gives you a platform to develop and nurture your ideas in an error-tolerable environment</p></li> 
<li><p>Enjoy a good networking of policy or other experts, entrepreneurs</p></li>
</ol>
							
							
						</div>
						<br style='clear: both' />
					</div>
				</div>
</div>
   <form method="post" class="formee" action="../debates/php_scripts/marketing_form.php" id="test" enctype="multipart/form-data" >
<fieldset>
<legend>Personal Information</legend>
<div id="ask-user">
<input type="checkbox" onclick="show_new()" checked="checked" style="margin:5px;float:left;" name="user_type" value="user_type" /><label>I'm already registered</label>
</div>
<div id="new-user" style="display:none">
<div class="grid-8-12">
<label>Name<em class="formee-req">*</em></label><input type="text" id="name_Req" name="name" title="Required! enter your name" ><br>
</div>
<div class="grid-3-12">
<label>Gender<em class="formee-req">*</em></label>
<ul class="formee-list">
<li><input type="radio" name="sex" value="male"><label>Male</label>
<li><input type="radio" name="sex" value="female"><label>Female</label>
</ul>
</div>
<div class="grid-6-12">
<label>Profession<em class="formee-req">*</em></label><input type="text" name="profession"><br>
</div>
<div class="grid-6-12">
<label>Organization<em class="formee-req">*</em></label><input type="text" name="org"><br>
</div>
<div class="grid-6-12">
<label>Contact number<em class="formee-req">*</em></label><input type="text" id="phone_Tel" name="contact" title="Enter a valid phone number"><br>
</div>
<div class="grid-6-12">
<label>Email id<em class="formee-req">*</em></label><input type="text" name="email" id="contact_Req_Email" title="Required! enter a valid email address" ><br>
</div></div>
<div id="return">
<div class="grid-6-12">
<label>Username<em class="formee-req">*</em></label><input type="text" id="username" name="username" title="Enter your username" ><br>
</div>
<div class="grid-6-12">
<label>Password<em class="formee-req">*</em></label><input type="password" id="password" name="password" title="Enter your password" ><br>
</div>
<div class="grid-12-12">
<span style="margin-top:100px;padding-top:50px;" id="status"></span>
</div>
</div>
</fieldset>
<fieldset>
<legend>Apply</legend>
<br>
<blockquote>Relevant Past Experiences for the post applied (Max 100 words overall)</blockquote>
<textarea name="past" rows="4" cols="100"></textarea>
<blockquote>Why would you like to join us? (max 100 words)</blockquote>
<textarea name="why" rows="4" cols="100"></textarea>
<blockquote>Mention in brief the Marketing Strategy(150 words)</blockquote>
<textarea name="strategy" rows="4" cols="100"></textarea>
<blockquote>List down potential sponsors relevant to the organization(min 5)</blockquote>
<div class="grid-12-12">
<input type="text" name="sponsors"><br>
<blockquote>Why should an organization/firm sponsor us. Mention the Deliverables(150 words)</blockquote>
<textarea name="why_sponsor" rows="4" cols="100"></textarea>
</fieldset>
<fieldset>
<legend>Resume</legend>
<div class="grid-12-12">
<label>Please upload your one page resume here in pdf or doc format.</label><input type="file" name="resume"><br>
</div>
</fieldset>
<div class="grid-12-12">
<input class="right" name="submit" id="mera_submit" type="submit"  value="Submit"/> 
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
						<a style="color:#aaa" href="http://theindianumbrella.com">The Indian Umbrella</a><br/>
						
					</div>
				</div>
			</div>

		</footer> 
</div>    
         

</body>
</html>
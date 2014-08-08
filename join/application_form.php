<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application Form</title>
  <link rel="shortcut icon" href="http://devilsnarewp7.com/vg/favicon.ico" type="image/x-icon" />
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
a{text-decoration:none;};
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
</SCRIPT>
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
<link href="../debates/css/style1.css" rel="stylesheet" />
<link href="../debates/css/style2.css" rel="stylesheet" />
<script type="text/javascript" src="../debates/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="../debates/js/formee.js"></script>
<script type="text/javascript" src="../debates/js/protoform.js"></script>
<script type="text/javascript" src="../debates/js/prototype-nw.js"></script>
<link rel="stylesheet" href="../debates/css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../debates/css/formee-style.css" type="text/css" media="screen" />
<script type="text/javascript">
function showfield(name){
  if(name=='other')document.getElementById('debate1').innerHTML='<input type="text" name="oth_debate1" />';
  else document.getElementById('debate1').innerHTML='';
}
function showfield1(name){
  if(name=='other')document.getElementById('level1').innerHTML='<input type="text" name="oth_level1" />';
  else document.getElementById('level1').innerHTML='';
  }
  function showfield2(name){
  if(name=='other')document.getElementById('debate2').innerHTML='<input type="text" name="oth_debate2" />';
  else document.getElementById('debate2').innerHTML='';
}
function showfield3(name){
  if(name=='other')document.getElementById('level2').innerHTML='<input type="text" name="oth_level2" />';
  else document.getElementById('level2').innerHTML='';}
  function showfield4(name){
  if(name=='other')document.getElementById('debate3').innerHTML='<input type="text" name="oth_debate3" />';
  else document.getElementById('debate3').innerHTML='';
}
function showfield5(name){
  if(name=='other')document.getElementById('level3').innerHTML='<input type="text" name="oth_level3" />';
  else document.getElementById('level3').innerHTML='';
}
function uploadMore(){
if(document.getElementById('more_sam').style.display=="none")
            document.getElementById('more_sam').style.display="block";
			else if(document.getElementById('more_sam1').style.display=="none")
            document.getElementById('more_sam1').style.display="block";
			else if(document.getElementById('more_sam2').style.display=="none")
            document.getElementById('more_sam2').style.display="block";
			else document.getElementById('msg').innerHTML='You cannot add more files';
			
}
</script>

<script language="javascript">  
        function showMenu()
        {
			if(document.getElementById('tab2').style.display=="none")
            document.getElementById('tab2').style.display="block";
			else if(document.getElementById('tab3').style.display=="none")
            document.getElementById('tab3').style.display="block";
		}
        function hideMenu()
        {
            if(document.getElementById('tab3').style.display=="block")
            document.getElementById('tab3').style.display="none";
			else if(document.getElementById('tab2').style.display=="block")
            document.getElementById('tab2').style.display="none";
        }   
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

    </script>


<script type="text/javascript">
Event.observe(window,"load",function() {
     
	new Protoform('test');     
	  
});
</script>
<link rel="stylesheet" href="../debates/css/custom_heading.css" />
</head>
<body>
<?php $user_type="new" ?>
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
								<li><p>Devise and test new debating models, i.e. devising new and innovative debating frameworks and format</p></li>
								<li><p>Build the organization's network by developing and sustaining touch with potential stakeholders</p></li>
								<li><p>Interview distinguished experts from various fields, including handling the decisions such as choice of format, content, and topic.</p></li>
								<li><p>Bolster the 'Lead Debates' with appropriate coverage of interviews/ videos with distinguished people</p></li>
								<li><p>Framing local, regional, national and international documentaries on self-shortlisted themes. </p></li>
								<li><p>Organising annual National Debating Conferences.</p></li>
								<li><p>Moderate debates online, thereby, testing pilot debating models and formats</p></li>
							</ol>
							<ol class="rounded-list">
								<li><p>Opportunity to initiate and lead one's own chapters in campuses and cities</p></li>
								<li><p>Approach distinguished people debate experts and handle them from initiation to end</p></li>
								<li><p>Exposure of working in a youth-led organization, progressively moving to higher national ownership roles on performance evaluation</p></li>
								<li><p>Emboldening one's own career progression through potential strong Letters of Recommendation by Advisors and Heads of organization</p></li>
								<li><p>Professional Growth through Networking and Skill Development</p></li>
								<li><p>Enjoy a good networking of policy or other experts, entrepreneurs and debaters</p></li>
								<li><p>Strong connect with distinguished people from one's career perspective</p></li>
								<li><p>Holistic development of personality leading to professional and leadership skill growth</p></li>
								<li><p>An opportunity to have invaluable work and extra-curricular experience</p></li>
							</ol>
							
							
						</div>
						<br style='clear: both' />
					</div>
				</div>
</div>
    <form method="post" class="formee" action="../debates/php_scripts/debator_form.php?type=<?php echo $user_type; ?>" id="test" enctype="multipart/form-data" >
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
<label>City<em class="formee-req">*</em></label><input type="text" name="city"><br>
</div>
<div class="grid-12-12">
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
<legend>Past Experiences of Debates Won/Participated</legend>
<br>
<table class="dd" width="100%" id="data">
<thead>
   <tr>
   <td>S no.</td>
    <td>Debate type</td>
    <td>Level</td>
	<td>Issue debated</td>
    <td>Organiser</td>
	<td>Estimated no of Participants</td>
    <td>Result</td>
	</tr>
	</thead>
	
	<tbody>
	<tr>
	<td><input name="id" id="id" size="2" type="text" value="1" readonly="readonly"/></td>
	<td>
	<select name="debate1" onchange="showfield(this.options[this.selectedIndex].value)">
    <option value="WUDC">WUDC</option>
	<option value="BP">BP</option>
	<option value="MUN">MUN</option>
	<option value="ASEAN">ASEAN</option>
	<option value="G8">G8</option>
	<option value="Town Hall">Town Hall</option>
	<option value="Panel">Panel</option>
	<option value="other">Other</option>
    </select></td><td>
	<select name="level1" onchange="showfield1(this.options[this.selectedIndex].value)">
    <option value="International">International</option>
	<option value="National">National</option>
	<option value="District">District</option>
	<option value="University">University</option>
	<option value="other" >Other</option>
    </select>
</td><td>
   <input name="issue1" id="issue1" type="text" />
  </td><td>
   <input name="org1" id="org1" type="text" />
  </td><td>
   <input name="parti1" id="parti1" type="text" />
  </td><td> 
   <input name="res1" id="res1" type="text" />
    </td>
	</tr>
	<tr><td></td><td><div id="debate1"></div></td><td><div id="level1"></div></td><td></td><td></td><td></td><td></td></tr>
	<tr><table><tr>
	<input name="learning1" id="learning" placeholder="Key learning derived in less than 30 words" type="text" />
	
	</tr></table></tr>
	</tbody>
	</table>
	<div id="tab2" style="display:none">
	<table>
	<tbody>
	<tr>
	<td><input name="id" id="id" size="2" type="text" value="2" readonly="readonly"/></td>
	<td>
	<select name="debate2" onchange="showfield2(this.options[this.selectedIndex].value)">
    <option value="WUDC">WUDC</option>
	<option value="BP">BP</option>
	<option value="MUN">MUN</option>
	<option value="ASEAN">ASEAN</option>
	<option value="G8">G8</option>
	<option value="Town Hall">Town Hall</option>
	<option value="Panel">Panel</option>
	<option value="other">Other</option>
    </select></td><td>
	<select name="level2" onchange="showfield3(this.options[this.selectedIndex].value)">
    <option value="International">International</option>
	<option value="National">National</option>
	<option value="District">District</option>
	<option value="University">University</option>
	<option value="other" >Other</option>
    </select>
</td><td>
   <input name="issue2" id="issue2" type="text" />
  </td><td>
   <input name="org2" id="org2" type="text" />
  </td><td>
   <input name="parti2" id="parti2" type="text" />
  </td><td> 
   <input name="res2" id="res2" type="text" />
    </td>
	</tr>
	<tr><td></td><td><div id="debate2"></div></td><td><div id="level2"></div></td><td></td><td></td><td></td><td></td></tr>
	<tr><table><tr>
	<input name="learning2" id="learning2" placeholder="Key learning derived in less than 30 words" type="text" />
	</tr></table></tr>
	</tbody>
	</table></div>
	<div id="tab3" style="display:none">
	<table>
	<tbody>
	<tr>
	<td><input name="id" id="id" size="2" type="text" value="3" readonly="readonly"/></td>
	<td>
	<select name="debate3" onchange="showfield4(this.options[this.selectedIndex].value)">
    <option value="WUDC">WUDC</option>
	<option value="BP">BP</option>
	<option value="MUN">MUN</option>
	<option value="ASEAN">ASEAN</option>
	<option value="G8">G8</option>
	<option value="Town Hall">Town Hall</option>
	<option value="Panel">Panel</option>
	<option value="other">Other</option>
    </select></td><td>
	<select name="level3" onchange="showfield5(this.options[this.selectedIndex].value)">
    <option value="International">International</option>
	<option value="National">National</option>
	<option value="District">District</option>
	<option value="University">University</option>
	<option value="other" >Other</option>
    </select>
</td><td>
   <input name="issue3" id="issue3" type="text" />
  </td><td>
   <input name="org3" id="org3" type="text" />
  </td><td>
   <input name="parti3" id="parti3" type="text" />
  </td><td> 
   <input name="res3" id="res3" type="text" />
    </td>
	</tr>
	<tr><td></td><td><div id="debate3"></div></td><td><div id="level3"></div></td><td></td><td></td><td></td><td></td></tr>
	<tr><table><tr>
	<input name="learning1" id="learning" placeholder="Key learning derived in less than 30 words" type="text" />
	</tr></table></tr>
	</tbody>
	</table>
	</div>
	<input type="button" style="float:right" onclick="hideMenu()" value="Remove" /><input type="button" style="float:right" onclick="showMenu()" value="Add more" />
<br>
</fieldset>
<fieldset>
<legend>Research paper/ writing/ blogging experience(if any) </legend>

<blockquote>Furnish us the link to your blogs. Also mention the frequency per week of your blogs and the duration of your blogging experience if any.</blockquote>
<textarea name="vvk" rows="4" cols="100"></textarea>
<blockquote>Attach the published sample along with this application if you have published any piece in any field in any journal</blockquote>
<blockquote>Attach your writing samples published in magazines/ print media etc.</blockquote>
<div class="grid-6-12"><input type="file" name="ufile1">
</div>
<div id="more_sam" style="display:none;" class="grid-6-12">
<input type="file" name="ufile2">
</div>
<div id="more_sam1" style="display:none;" class="grid-6-12">
<input type="file" name="ufile3">
</div>
<div id="more_sam2" style="display:none;" class="grid-6-12">
<input type="file" name="ufile4">
</div>

<div class="grid-2-12"><div id="msg"></div><input type="button" style="float:right" onclick="uploadMore()" value="Add more" /></div>
</fieldset>
<fieldset>
<legend>Writing/ analytics test</legend>
<blockquote>Critically examine in less than 150 words the stated or unstated assumptions of the argument mentioned below and explain how the argument depends on the assumptions and what the implications are if the assumptions prove baseless. </blockquote>
<blockquote>A decade and a half ago, the Residents Welfare Association of Rohini Sector-16 community adopted a set of restrictions on how the community's yards should be used and landscaped. It undertook a series of measures of beautifying the entire community by launching a sanitation drive and even got the exteriors of all homes painted green. Since then, average property values have tripled in Sector-16. In order to raise property values in other sectors, similar measures should be adopted</blockquote>
<br><br><textarea name="arg" rows="4" cols="100"></textarea><br><br>
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
						<li><a href="http://www.theindianumbrella.com.termsofuse.html">Terms of Use</a></li>
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
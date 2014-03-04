<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application Form</title>
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
	padding: 10px;		
	color: #444;	
}
h1 {
	font-size: 2.2em;		
}
#header {
	position: relative;
	height: 205px;
	background: #317cb1 url(header.gif) no-repeat;	
	color: #fff;	
	padding: 0;	
	margin-top: 0;
}
#header h1#logo-text a {
	position: absolute;
	margin: 0; padding: 0;
	font: bold 56px 'Trebuchet MS', 'Helvetica Neue', Arial, Sans-serif;
	letter-spacing: -3px;
	text-decoration: none;
	color: #fff;
	float:right;
	/* change the values of top and left to adjust the position of the logo*/
	top: 58px; 
}
</style>
<link href="style.css" rel="stylesheet" />
<link href="css/style1.css" rel="stylesheet" />
<link href="css/style2.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="js/formee.js"></script>
<script type="text/javascript" src="js/protoform.js"></script>
<script type="text/javascript" src="js/prototype-nw.js"></script>
<link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />




<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type='text/javascript'>
//<![CDATA[
 $(document).ready(function() {
  var currentItem = 1;
  $('#addnew').click(function(){
   currentItem++;
   $('#items').val(currentItem);
var strToAdd = '<tr><td><input name="id" id="id" type="text" size="2" readonly="readonly" value="'+currentItem+'" /></td><td><input name="debate'+currentItem+'" id="debate'+currentItem+'" type="text" /></td><td><input name="issue'+currentItem+'" id ="issue'+currentItem+'"type="text" /></td><td><input name="org'+currentItem+'" id="org'+currentItem+'" type="text" /></td><td><input name="parti'+currentItem+'" id="parti'+currentItem+'" type="text" /></td><td><input name="res'+currentItem+'" id="res'+currentItem+'" type="text" /></td></tr>';
   $('#data').append(strToAdd);
   
  });
 });
 
//]]>
</script>
<script type="text/javascript">
Event.observe(window,"load",function() {
     
	new Protoform('test');     
	  
});
</script>

</head>
<body>
<div id="wrapper"><div id="header">			
		<div id="logo"><img src="images/logo.png" /></div>	
		<h1 id="logo-text"><a href="index.html" title="">Application form</a></h1>		
							
	</div>
<?php
include 'config.php';
if(isset($_POST['name']) && isset($_POST['profession']) && isset($_POST['org']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['contact']))
{
	$name = mysql_real_escape_string($_POST['name']);
	$profession = mysql_real_escape_string($_POST['profession']);
	$org = mysql_real_escape_string($_POST['org']);
	$email = mysql_real_escape_string($_POST['email']);
	$city = mysql_real_escape_string($_POST['city']);
	$contact = mysql_real_escape_string($_POST['contact']);
	
	if(!empty($_POST['name']) && !empty($_POST['profession']) && !empty($_POST['org']) && !empty($_POST['city']) && !empty($_POST['email']) &&       !empty($_POST['contact'])){
		
		$fp = fopen("webapplication.txt", "a");
		$past="S.no.\t\tWebsite type\t\tWebsite Link";
		$c=$_POST['id'];
		$count=(int)$c;
		for( $i = 1; $i <= $count; $i++ )
		{
			$type = $_POST['type'.$i];
			$link = $_POST['link'.$i];
			$past = $past.$i."\t\t".$type."\t\t".$link."\n";
		}

		$savestring = "Name:".$name."\nProfession:".$profession."\nOrganization:".$org."\nCity:".$city."\nContact number:".$contact."\nEmail:".$email."\nPast 			Experiences of websites \n\n".$past."\n";
		fwrite($fp, $savestring);
		fwrite($fp,"\n\n\n");
		fclose($fp);
		echo "<p style=\"margin-left:30px;font-size:16px;color:blue;\">Thank you for your application. We will get back to you soon!</p>";

		$to      = 'theindianumbrella@gmail.com'; // Sends email to us
		$subject = 'Webteam application'; // Give the email a subject 
		$message =  $savestring; // Our message above including the link
							
		$headers = 'From:maskaravivek@gmail.com' . "\r\n"; // Set from headers
		mail($to, $subject, $message, $headers); // Send our email

		
	}
	else{echo '<p style="color:red;margin-left:30px;font-size:16px;">Fill in all the fields</p>';}
	
	
	
}

else{echo mysql_error();}

?>    
   


<form method="post" class="formee" action="webteam.php" id="test">
<fieldset>
<legend>Personal Information</legend>
<div class="grid-12-12">
<label>Name<em class="formee-req">*</em></label><input type="text" id="name_Req" name="name" title="Required! enter your name" ><br>
</div>
<div class="grid-12-12">
<label>Profession<em class="formee-req">*</em></label><input type="text" name="profession"><br>
</div>
<div class="grid-12-12">
<label>Organization<em class="formee-req">*</em></label><input type="text" name="org"><br>
</div>
<div class="grid-12-12">
<label>Gender</label>
<ul class="formee-list">
<li><input type="radio" name="sex" value="male"><label>Male</label>
<li><input type="radio" name="sex" value="female"><label>Female</label>
</ul>
</div>
<div class="grid-12-12">
<label>Contact number<em class="formee-req">*</em></label><input type="text" id="phone_Tel" name="contact" title="Enter a valid phone number"><br>
</div>
<div class="grid-12-12">
<label>City<em class="formee-req">*</em></label><input type="text" name="city"><br>
</div>
<div class="grid-12-12">
<label>Email id<em class="formee-req">*</em></label><input type="text" name="email" id="contact_Req_Email" title="Required! enter a valid email address" ><br>


<br>


<legend>Prerequisites</legend>
<blockquote>A good knowledge of designing including advanced HTML and CSS is required. The applicant is also required to have a strong hand in PHP,MySQL,Jquery and Javascript. Also he/she must have built atleast one website before. After the submission,the applicant will be provided with a task to be done in a particular period of time. Judging on the completion of the task, the applicant will be taken in the Web development team of The Indian Umbrella       </blockquote>

<br />

<legend>Websites made</legend>

<table class="dd" width="100%" id="data">
   <tr>
    <td>S no.</td>
    <td>Website type</td>
    <td>Website link</td>

   </tr>
   <tr>
    <td><input name="id" id="id" size="2" type="text" value="1" readonly="readonly"/></td>
    <td><input name="type1" id="type1" type="text" /></td>
    <td><input name="link1" id="link1" type="text" /></td>
    <td><input type="button" id="addnew" name="addnew" value="Add" /> </td>
   </tr>
</table>
<br>

<br><textarea name="arg" rows="4" cols="100"></textarea><br><br>
<div class="grid-12-12">
<input class="right" name="submit" id="s9" type="submit"  value="Submit"/> 
</div>
</fieldset>
</form>
    
    
    
        
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
        
   
   
   
        
   		
        
            

</body>
</html>
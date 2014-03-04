<?php session_start();
include 'config.php';
if( isset($_POST['username'])  && isset($_POST['password']) )
{
$userid = $_POST['username'];
$password = md5($_POST['password']);
if(!empty($userid) && !empty($password))
{
$sql="SELECT id,name, userid FROM members WHERE userid='$userid' AND password='$password' AND validate='1'";
$query_run = mysql_query($sql);
$no_of_rows = mysql_num_rows($query_run); 
if($no_of_rows==0) {
echo "Invalid username and password combination";
}
else if($no_of_rows==1){ 
$row=mysql_fetch_array($query_run);
$id=$row['id'];
$username=$row['userid'];
$name=$row['name'];
$_SESSION['user_id']=$id;
$_SESSION['name']=$name;
$login=true;
}
else {echo "You need to supply a username and password.";}
}}
?>
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


<title>Remarks</title>
 <link rel="shortcut icon" href="http://theindianumbrella.com/debates/favicon.ico" type="image/x-icon" />
<link href="style.css" rel="stylesheet" />
<link href="css/login_box.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/custom_heading.css" />
<link href="css/style1.css" rel="stylesheet" />
<link href="frame.css" rel="stylesheet" type="text/css"><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
<link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />  
<link href="css/footer_nav.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/default_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/header_nav.css" />
		<script src="js/modernizr.custom_nav.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="style_mod.css" />
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
<style>
a{text-decoration:none;}
</style>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script>
function check()
{
var radios = document.getElementsByName('radio_type');

for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        // do whatever you want with the checked radio
        
document.getElementById('write').innerHTML=radios[i].value;
        // only one radio can be logically checked, don't check the rest
        break;
    }
}
}
</script>
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
					
						
					<ul style="margin-top:20px;list-style-type: none;" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../debates/images/Facebook.png"></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../debates/images/Twitter.png"></a></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../debates/images/googleplus.png"></a></li>
								
								</ul>
								
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
<div style="padding:10px;background-color:#aaa;"><h3 style="text-transform:none;font-size:20px;font-family: 'Signika', sans-serif;">Lead Debator's Remark page<span style="float:right;margin-top:-12px;"><?php if(!isset($_SESSION['user_id'])){?><a href="#loginmodal" class="flatbtn" id="modaltrigger">Login</a><?php }else{ ?><a href="logout.php" class="flatbtn">Logout</a><?php } ?></span></h3></div> 
<?php 
if(isset($_POST['content']) && isset($_SESSION['user_id']) && $_POST['debate'])
{
	$user_id=$_SESSION['user_id'];
	$debate_detail=$_POST['debate'];
	$detail=explode("&",$debate_detail);
	$remarks = $_POST['content'];
    $debate = $_POST['debate'];
    if($debate == 'checked'){
	if(!empty($remarks)){
		$insert = "INSERT INTO comments(debate_id,user_id,comment,comment_type) VALUES('$detail[0]','$user_id','$remarks','$detail[1]') ";
		if(mysql_query($insert)){ ?><div class="formee-msg-success"><h4>Your remark has been posted</h4></div><?php } 
		else{ ?><div class="formee-msg-error"><h4>Your remark could not be added.We are sorry for the inconvenience</h4></div><?php }
	}
    else{?><div class="formee-msg-error"><h4>Fill in all the remarks.</h4></div><?php }
    }
    else{?><div class="formee-msg-error"><h4>Please choose the debate.</h4></div><?php }
}
else{mysql_error();}
if ($_SESSION['user_id']) {
$name=$_SESSION['name'];
 ?>
<div class="formee-msg-info"><h3 id="issue"></h3><p>Welcome back, <?php echo $name; ?>!</p></div>
<form class="formee"  method="post" name="form" action="debator-remarks.php">
<label>Select an ongoing debate to post an statement</label>
<ul>
<?php $id=$_SESSION['user_id'];
$sql=mysql_query("SELECT id,issue,moderator_id,proposition_id, opposition_id, status from debates WHERE moderator_id='$id' AND type='current' OR proposition_id='$id' AND type='current' OR opposition_id='$id' AND type='current';");
while($row_debate=mysql_fetch_array($sql))
{$cnt=1;
$debate_id=$row_debate['id'];
$debate_phase=$row_debate['status'];
$issue=$row_debate['issue'];
$det=$debate_id."&".$debate_phase;
if($debate_phase==1)
$phas="Opening Statement";
else if($debate_phase==2)
$phas="Rebuttal Statement";
else if($debate_phase==3)
$phas="Closing Statement";
else
$phas="None";
?>
<li><input type="radio" id="radio<?php echo $cnt;?>" name="debate" value="<?php echo $det; ?>"><label><?php echo $issue; ?>(<?php echo $phas; ?>)</label>
<?php $cnt++; } ?>
</ul>
<textarea cols="100" rows="4" name="content" id="content" ></textarea>
<input style="float:right;" type="submit"  value="Post" name="submit"/>
</form>
<?php } else {?>
<div class="formee-msg-error"><h3><?php $issue; ?></h3><p>Log in to post as a debator.</p></div>
 <?php } ?>
 <div id="loginmodal" style="display:none;">
    <h2 style="text-align:center;font-size:20px;font-family: 'Signika', sans-serif;">Debator Login</h2>
    <form  name="loginform" method="post" action="debator-remarks.php">
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" class="txtfield" tabindex="1">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password" class="txtfield" tabindex="2">
      <div class="center"><input type="submit" name="loginbtn" id="loginbtn" class="flatbtn-blu hidemodal" value="Log In" tabindex="3"></div>
    </form>
  </div>
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
 <script type="text/javascript">
$(function(){
  $('#loginform').submit(function(e){
    return false;
  });
  
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});
</script>
</body>
</html>
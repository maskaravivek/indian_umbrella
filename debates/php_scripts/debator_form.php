<html>
<head>
<style>
a{text-decoration:none;}
</style>
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
								<li><a href="index.php">Debates</a></li>
								<li><a href="http://www.theindianumbrella.com/perspectives">Perspectives</a></li>
								<li><a href="http://www.theindianumbrella.com/interviews">Interviews</a></li>
								<li><a href="http://www.theindianumbrella.com/join">Join</a></li>
								<li><a href="http://www.theindianumbrella.com/contact.html">Contact</a></li>
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
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../images/Facebook.png"></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../images/Twitter.png"></a></a></li>
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="../images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
			<?php include 'config.php';
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

try{
	$size = strlen( $chars );
	for( $i = 0; $i < 8; $i++ ) {
		$rand_name .= $chars[ rand( 0, $size - 1 ) ];}
$resume="_resume";
$path1= "../uploads/".$rand_name.$_FILES['ufile1']['name'];
$path2= "../uploads/".$rand_name.$_FILES['ufile2']['name'];
$path3= "../uploads/".$rand_name.$_FILES['ufile3']['name'];
$path4= "../uploads/".$rand_name.$_FILES['ufile4']['name'];
$path5= "../uploads/".$rand_name.$resume.$_FILES['resume']['name'];
$pre="http://www.theindianumbrella.com/debates/uploads/";
if (!empty($_FILES['resume']['name'])) move_uploaded_file($_FILES['resume']['tmp_name'], $path5);
$resume=$pre.$rand_name.$resume.$_FILES['resume']['name'];
if(isset($_POST['user_type']))
{
$userid=$_POST['username'];
$sql1=mysql_query("SELECT * FROM  members WHERE userid='$userid'");
$num_rows = mysql_num_rows($sql1);
if($num_rows==1)
{
$row1=mysql_fetch_array($sql1);
$user_data_id=$row1['user_data_id'];
$us_typ="return";
}
}
else
{
if(!empty($_POST['name']) & !empty($_POST['email']) & !empty($_POST['contact']))
{
$name = $_POST['name'];
$gender=$_POST['sex'];
$profession=$_POST['profession'];
$org=$_POST['org'];
$email = $_POST['email'];
$city=$_POST['city'];
$contact=$_POST['contact'];

mysql_query("INSERT INTO user_data(Name,Gender,Profession,Organisation,Contact,City, Email,resume_link) VALUES('$name','$gender','$profession','$org','$contact','$city','$email','$resume')")  ;
$user_data_id=mysql_insert_id();
$us_typ="new";
} else{?><div class="formee-msg-error"><h4>Required fields cannot be left empty.</h4></div> <?php }}

if (!empty($_FILES['ufile1']['name'])) {move_uploaded_file($_FILES['ufile1']['tmp_name'], $path1);
mysql_query("INSERT INTO debator_files(user_data_id,file_links) VALUES ('$user_data_id','$path1')");}
if (!empty($_FILES['ufile2']['name'])) {move_uploaded_file($_FILES['ufile2']['tmp_name'], $path2);
mysql_query("INSERT INTO debator_files(user_data_id,file_links) VALUES ('$user_data_id','$path2')");}
if (!empty($_FILES['ufile3']['name'])) {move_uploaded_file($_FILES['ufile3']['tmp_name'], $path3);
mysql_query("INSERT INTO debator_files(user_data_id,file_links) VALUES ('$user_data_id','$path3')");}
if (!empty($_FILES['ufile4']['name'])) {move_uploaded_file($_FILES['ufile4']['tmp_name'], $path4);
mysql_query("INSERT INTO debator_files(user_data_id,file_links) VALUES ('$user_data_id','$path4')");}

for( $i = 1; $i <= 3; $i++ )
{
    $debate = $_POST['debate'.$i];
	if($debate=='other')
	$debate=$_POST['oth_debate'.$i];
	$level = $_POST['level'.$i];
	if($level=='other')
	$level=$_POST['oth_level'.$i];
    $issue = $_POST['issue'.$i];
    $org = $_POST['org'.$i];
    $parti = $_POST['parti'.$i];
    $res = $_POST['res'.$i];
	$learning=$_POST['learning'.$i];
	if(!empty($_POST['issue'.$i]) )
	mysql_query("INSERT INTO debator_past(user_data_id,debate_type,level,issue,organiser,parti,result,learn) VALUES('$user_data_id','$debate','$level','$issue','$org','$parti','$res','$learning')");
}
$arg=$_POST['arg'];
$research=$_POST['vvk'];
mysql_query("INSERT INTO debator_application(user_data_id,research,argument) VALUES ('$user_data_id','$research','$arg')");
$app_type="debate";
$status="new";
$application_ref="TIU/LD/".$user_data_id;
mysql_query("INSERT INTO applications(user_data_id,application_type,status,app_ref) VALUES ('$user_data_id','$app_type','$status','$application_ref')");
?>
<div class="formee-msg-success"><h4>Thank you for your application. We will get back to you soon!</h4>
<p>Your reference number is <?php echo $application_ref;?>.</p>
</div>
<?php if($us_typ=="new"){ ?>
<div class="formee-msg-info"><h4>Go ahead and register for an account if you wish.</h4></div>
<div class="vpb_main_wrapper"><br clear="all">
<div style="width:115px; padding-top:10px;float:left;" align="left">Username:</div>
<div style="width:300px;float:left;" align="left"><input type="text" id="usernames" name="usernames" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">
<div style="width:115px; padding-top:10px;float:left;" align="left">Password:</div>
<div style="width:300px;float:left;" align="left"><input type="password" id="passs" name="passs" value="" class="vpb_textAreaBoxInputs"></div><br clear="all"><br clear="all">
<div style="width:115px; padding-top:10px;float:left;" align="left">&nbsp;</div>
<div style="width:300px;float:left;" align="left">
<a href="javascript:void(0);" class="vpb_general_button" onClick="Users_Registration('<?php echo $user_data_id?>');">Register</a></div>

<br clear="all"><br clear="all">

<div align="left" id="signup_status"></div>

</div>
<?php } }
catch (Exception $e)
{ ?>
<div class="formee-msg-error"><h4>Your application could not be submitted. We are sorry for the inconvenience. Please contact us at applications@theindianumbrella.com</h4></div>
<?php }
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
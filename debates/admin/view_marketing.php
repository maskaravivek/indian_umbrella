<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=view_marketing.php?id=".$_GET['id']);
}
else
header("Location: login.php?url=view_marketing.php?id=".$_GET['id']);
$app_id=$_GET['id'];
if($_GET['action']=="approve")
{
$stat="approved";
mysql_query("UPDATE applications SET status='$stat' WHERE user_data_id='$app_id'");
}
else if($_GET['action']=="reject")
{
$stat="rejected";
mysql_query("UPDATE applications SET status='$stat' WHERE user_data_id='$app_id'");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>View Application</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="../css/resume.css" media="all" />
<link href="../css/tablecloth.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../js/tablecloth.js"></script>
</head>
<body>
<?php 
include('../config.php');

if(!empty($_GET["id"]))$id=$_GET["id"];
else $id=1;
$sql=mysql_query("SELECT * from applications WHERE user_data_id='$id'");
$row=mysql_fetch_array($sql);
$type=$row['application_type'];
$status=$row['status'];
$sql1=mysql_query("SELECT * from user_data WHERE ID='$id'");
$row1=mysql_fetch_array($sql1);
$name=$row1['Name'];
$sex=$row1['Gender'];
$prof=$row1['Profession'];
$org=$row1['Organisation'];
if($prof==null){$prof="Student";$org=$row1['College'];}
$contact=$row1['Contact'];
$email=$row1['Email'];
$resume=$row1['resume_link'];
$sql2=mysql_query("SELECT * from marketing_application WHERE user_data_id='$id'");
$row2=mysql_fetch_array($sql2);
$past=$row2['past'];
$why=$row2['why_join'];
$strat=$row2['strategy'];
$sponsor=$row2['sponsor'];
$why_sponsor=$row2['why_sponsor'];
?>
<div id="doc2" class="yui-t7">
	<div id="inner">
	
		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1><?php echo $name; ?></h1>
					<h2><?php echo $prof; ?>, <?php echo $org ?></h2>
				</div>

				<div class="yui-u">
					<div class="contact-info">
						<h3><a id="pdf" href="<?php echo $resume; ?>">Download Resume</a></h3>
						<?php if($status=="new") {?>
						<a id="pdf" style="margin-right:2px;" href="view_marketing.php?id=<?php echo $id;?>&action=approve">Approve</a>
						<a id="pdf" href="view_marketing.php?id=<?php echo $id;?>&action=reject">Reject</a></h3>
						<?php }
						else if($status=="approved"){?>
						<a id="pdf" style="margin-right:2px;" href="view_marketing.php?id=<?php echo $id;?>&action=reject">Reject</a>
						<?php } 
						else if($status=="rejected"){?>
						<a id="pdf" style="margin-right:2px;" href="view_marketing.php?id=<?php echo $id;?>&action=approve">Approve</a>
						<?php } ?>
						<h3><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></h3>
						<h3><?php echo $contact; ?></h3>
					</div><!--// .contact-info -->
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Past Experience</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $past ?></p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Why would I like to join..</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $why ?></p>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Marketing Strategy</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $strat ?></p>
						</div>
					</div><!--// .yui-gf-->
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Potential Sponsors</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $sponsors ?></p>
						</div>
					</div>
					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Why a organization/firm should sponsor us..</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $why_sponsor ?></p>
						</div>
					</div>



				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p><?php echo $name; ?> &mdash; <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a> &mdash; <?php echo $contact;?></p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

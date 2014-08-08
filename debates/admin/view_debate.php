<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=view_debate.php?id=".$_GET['id']);
}
else
header("Location: login.php?url=view_debate.php?id=".$_GET['id']);
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
$dob=$row1['DOB'];
$prof=$row1['Profession'];
$org=$row1['Organisation'];
if($prof==null){$prof="Student";$org=$row1['College'];}
$contact=$row1['Contact'];
$email=$row1['Email'];
$city=$row1['City'];
$resume=$row1['resume_link'];
$sql2=mysql_query("SELECT * from debator_application WHERE user_data_id='$id'");
$row2=mysql_fetch_array($sql2);
$research=$row2['research'];
$arg=$row2['argument'];
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
							<h2>Past Experiences of Debates Won/Participated</h2>
						</div>
						<div class="yui-u">
						<div id="content">
								<table>
            <thead>
                <tr>
					<th>S.no.</th>
					<th>Type</th>
					<th>Level</th>
					<th>Issue</th>
					<th>Organiser</th>
					<th>Participants</th>
					<th>Result</th>
					<th>Key Learning</th>
                </tr>
            </thead>
            <tbody>
<?php 
$sql=mysql_query("SELECT * from debator_past WHERE user_data_id='$id' ORDER BY id DESC LIMIT 3");
$cnt=1;
while($row3=mysql_fetch_array($sql))
{
$type=$row3['debate_type'];
$level=$row3['level'];
$issue=$row3['issue'];
$org=$row3['organiser'];
$parti=$row3['parti'];
$result=$row3['result'];
$key=$row3['learn'];
if($key==null)
$key="-";
?>
<tr>
<td><?php echo $cnt; ?></td>
<td><?php echo $type; ?></td>
<td><?php echo $level; ?></td>
<td><?php echo $issue; ?></td>
<td><?php echo $org; ?></td>
<td><?php echo $parti; ?></td>
<td><?php echo $result; ?></td>
<td><?php echo $key; ?></td>
</tr>
<?php $cnt=$cnt+1;
}
?>
            </tbody>
        </table></div>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Research paper/ writing/ blogging experience</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $research ?></p>
							<h3>Uploaded files</h3>
							<? 
							$result=mysql_query("SELECT * from debator_files WHERE user_data_id='$id'");
							$cnt=1;
while($row=mysql_fetch_array($result))
{
$link=$row['file_link'];
?>
<a id="pdf" href="<?php echo $link; ?>">Download file <?php echo $cnt;?></a>
<?php 
$cnt=$cnt+1;
} ?>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Writing/Analytics test</h2>
						</div>
						<div class="yui-u">
							<p class="enlarge"><?php echo $arg ?></p>
						</div>
					</div><!--// .yui-gf-->

					



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

<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=index.php");
}
else
header("Location: login.php?url=index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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


		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>The Indian Umbrella Admin</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<!--[if IE]><![if gte IE 6]><![endif]-->
		<script src="js/jquery-1.4.2.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.8.1.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				$("#content .grid_5, #content .grid_6").sortable({
					placeholder: 'ui-state-highlight',
					forcePlaceholderSize: true,
					connectWith: '#content .grid_6, #content .grid_5',
					handle: 'h2',
					revert: true
				});
				$("#content .grid_5, #content .grid_6").disableSelection();
			});
		</script>
		<!--[if IE]><![endif]><![endif]-->
	</head>
	<body>
<?php 
$result=mysql_query("SELECT * FROM applications where status='new'");
$new_apps = mysql_num_rows($result);
$result=mysql_query("SELECT id from members");
$users = mysql_num_rows($result);
$result=mysql_query("SELECT Id from subscription");
$subs = mysql_num_rows($result);
$result=mysql_query("SELECT id from debates");
$debates = mysql_num_rows($result);
$result=mysql_query("SELECT comment_id from comments");
$remarks = mysql_num_rows($result);
?>
		<h1 id="head">The Indian Umbrella<span style="float:right;">Welcome, <?php echo $name;?> <a href="logout.php">Logout</a></span></h1>
		
		<ul id="navigation">
			<li><span class="active">Overview</span></li>
			<li><a href="manage.php">Debates</a></li>
			<li><a href="users.php">Registered Users</a></li>
		</ul>

			<div id="content" class="container_16 clearfix">
				<div class="grid_5">
					<div class="box">
						<h2>Subscribers</h2>
						<div class="utils">
							<a href="email.php">Send mail</a>
						</div>
						<table>
							<?php 
$sql=mysql_query("SELECT Email FROM subscription ORDER BY id LIMIT 5");
while($row=mysql_fetch_array($sql))
{
$email=$row['Email'];
?>
<tr><td><?php echo $name; ?></td><td><?php echo $email; ?></td></tr><?php } ?>
							</tbody>
						</table>
					</div>
					<div class="box">
						<h2>Ongoing Debates</h2>
						
						<table>
							<tbody>
								<?php 
$sql=mysql_query("select issue, start_date from debates WHERE type='current' ORDER BY id DESC LIMIT 5");
while($row=mysql_fetch_array($sql))
{
$issue=$row['issue'];
$start=$row['start_date'];
?>
<tr><td><?php echo $issue; ?></td><td><?php echo $start; ?></td></tr><?php } ?>
							</tbody>
						</table>
					</div>
					<div class="box">
						<h2>Applications</h2>
						<div class="utils">
							<a href="applications.php">View</a>
						</div>
						<p class="center">There are <a href="applications.php"><?php echo $new_apps; ?></a> new applications</p>
					</div>
					<div class="box">
						<h2>Start a debate</h2>
						<div class="utils">
							<a href="debate.php">Go</a>
						</div>
						<p class="center">Add the details to start a new debate.</p>
					</div>
				</div>
				<div class="grid_6">
					<div class="box">
						<h2>New Registrations</h2>
						<div class="utils">
							<a href="users.php">View More</a>
						</div>
						<table>
							<?php 
$sql=mysql_query("SELECT name,userid FROM members WHERE 1 ORDER BY id DESC LIMIT 5");
while($row=mysql_fetch_array($sql))
{
$name=$row['name'];
$userid=$row['userid'];
?>
<tr><td><?php echo $name; ?></td><td><?php echo $userid; ?></td></tr><?php } ?>
							</tbody>
						</table>
					</div>
					<div class="box">
						<h2>Schedule</h2>
							<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;height=260&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=bqrn1uqm7s3qq7lphfbq40boi4%40group.calendar.google.com&amp;color=%23711616&amp;ctz=Asia%2FCalcutta" style=" border-width:0 " width="340" height="260" frameborder="0" scrolling="no"></iframe>
					</div>
				</div>
				<div class="grid_5">
					<div class="box">
						<h2>Statistics</h2>
						<table>
							<tbody>
								<tr>
									<td>Users</td>
									<td><?php echo $users; ?></td>
								</tr>
								<tr>
									<td>New Applications</td>
									<td><?php echo $new_apps; ?></td>
								</tr>
								<tr>
									<td>Debates</td>
									<td><?php echo $debates; ?></td>
								</tr>
								<tr>
									<td>Subscriptions</td>
									<td><?php echo $subs; ?></td>
								</tr>
								<tr>
									<td>Remarks</td>
									<td><?php echo $remarks; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="box">
						<h2>Announcement</h2>
						<form action="#" method="post">
							<p>
								<label for="title">Title</label>
								<input type="text" name="title" />
							</p>
							<p>
								<label for="post">Post </label>
								<textarea name="post"></textarea>
							</p>
							<p>
								<input type="submit" value="post" />
							</p>
						</form>
					</div>
				</div>
			</div>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<a href="#">Contact Me</a>
				</div>
			</div>
		</div>
	</body>
</html>
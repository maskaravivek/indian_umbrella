<?php 
session_start();
include '../config.php';
$debate_id=$_GET['debate_id'];
if(isset($_SESSION['user_id'])){
$name = $_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
{
header("Location: login.php?url=bg_reading.php?debate_id=".$debate_id);
}}
else
{

header("Location: login.php?url=bg_reading.php?debate_id=".$debate_id);
}?>

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
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="../css/formee-structure.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../css/formee-style.css" type="text/css" media="screen" />

<link rel="stylesheet" href="../css/table_style.css" />

	</head>
	<body>
    
    <h1 id="head" style="width:90%;margin:auto;">The Indian Umbrella<span style="float:right;">Welcome, <?php echo $name;?> <a href="logout.php">Logout</a></span></h1>
    
	<?php 
    $query_debate = mysql_fetch_array(mysql_query("SELECT issue FROM debates WHERE id='$debate_id' "));
	$debate = $query_debate['issue'];
    if(isset($_POST['description']) && isset($_POST['link']) && isset($_POST['title'])){
		$description = mysql_real_escape_string($_POST['description']);
		$link = mysql_real_escape_string($_POST['link']);
		$title = mysql_real_escape_string($_POST['title']);
        if(!empty($description) && !empty($link) && !empty($title)){
			if(mysql_query("INSERT INTO bg_reading (description,link,title,debate_id) VALUES ('$description','$link','$title','$debate_id')")){
				?><div class="formee-msg-success"><h4>A record has been added</h4></div><?php
			}
			else{
			?><div class="formee-msg-error"><h4>Oops...Some techincal error occured.Please try again.</h4></div><?php
			}
		
		}
		else{
		?><div class="formee-msg-error"><h4>Required fields cannot be left empty.</h4></div><?php
			}
	
	
	}
	?>
	<form method="post" class="formee" id="test" action="bg_reading.php?debate_id=<?php echo $debate_id; ?>">
	<fieldset>
	
	<legend>Background Reading</legend>
	<div class="grid-12-12">
	<label><i>Debate : </i> <?php echo $debate; ?> </label>
	</div>
    <div class="grid-12-12">
    <label>Enter the title<em class="formee-req">*</em></label><input type="text" name="title" title="Required! Enter the title" ><br>
    </div>
	<div class="grid-12-12">
    <label>Enter the description<em class="formee-req">*</em></label><input type="text" name="description" title="Required! Enter the description" ><br>
	</div>
	<div class="grid-12-12">
    <label>Enter the link<em class="formee-req">*</em></label><input type="text" name="link" title="Required! Enter the link" ><br>
	</div>
    <div class="grid-12-12">
    <input class="right" name="submit" id="s9" type="submit"  value="Submit" /> 
    </div>
	
	</fieldset>
	</form>
	
	</body>
</html>
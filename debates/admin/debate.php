<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=debate.php");
}
else
header("Location: login.php?url=debate.php");
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
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="../css/formee-structure.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/formee-style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="jquery1.js"></script>
<script type="text/javascript" src="jquery.watermarkinput.js"></script>
	<script type="text/javascript">
	var m=$.noConflict();
m(document).ready(function(){

m(".search").keyup(function() 
{
var searchbox = m(this).val();
var dataString = 'searchword='+ searchbox;

if(searchbox=='')
{
}
else
{

m.ajax({
type: "POST",
url: "search.php",
data: dataString,
cache: false,
success: function(html)
{

m("#display").html(html).show();
	
	
	}




});
}return false;    


});
});

jQuery(function($){
   m("#searchbox").Watermark("Search");
   });
</script>
<style type="text/css">
body
{
font-family:"Lucida Sans";

}
*
{
margin:0px
}
#searchbox
{
width:250px;
border:solid 1px #000;
padding:3px;
}
#display
{
width:250px;
display:none;
float:right; margin-right:30px;
border-left:solid 1px #dedede;
border-right:solid 1px #dedede;
border-bottom:solid 1px #dedede;
overflow:hidden;
}
.display_box
{
padding:4px; border-top:solid 1px #dedede; font-size:12px; height:30px;
}

.display_box:hover
{
background:#3b5998;
color:#FFFFFF;
}
#shade
{
background-color:#00CCFF;

}


</style>
	</head>
	<body>

	<h1 id="head">The Indian Umbrella<span style="float:right;">Welcome, <?php echo $name;?> <a href="logout.php">Logout</a></span></h1>
	<ul id="navigation">
			<li><a href="index.php">Overview</a></li>
			<li><a href="manage.php">Debates</a></li>
			<li><a href="users.php">Registered Users</a></li>
		</ul>
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Start a new debate</h2>
					<?php
include '../config.php';
$issue=$_POST['issue'];
$desc=$_POST['description'];
$category=$_POST['category'];
$start=$_POST['start'];
$end=$_POST['end'];
$pro=$_POST['pro'];
$con=$_POST['opp'];
if(!empty($issue) && !empty($desc) && !empty($category) && !empty($start) && !empty($end) && !empty($pro) && !empty($con)){
		$query_pro = mysql_query(" SELECT id FROM members WHERE userid='$pro' ");
		$query_opp = mysql_query(" SELECT id FROM members WHERE userid='$con' ");
		if( mysql_num_rows($query_pro) == 0 || mysql_num_rows($query_opp) == 0){ ?>
			<div class="formee-msg-error">No such record of proposer/opposer was found in our database.Please fill in correct IDs</div>
		<?php }
		else{
			$pro_id = mysql_fetch_assoc($query_pro);
			$opp_id = mysql_fetch_assoc($query_opp);
			
			$prop_id = $pro_id['id'];
			$oppo_id = $opp_id['id'];
$insert="INSERT INTO debates(issue,start_date,end_date,proposition_id,opposition_id,description,category) VALUES('$issue','$start','$end','$prop_id','$oppo_id','$desc','$category') ";
if(mysql_query($insert)){ ?><div class="formee-msg-success"><h4>Debate added successfully</h4></div><?php } 
		else{ ?><div class="formee-msg-error"><h4>Some error occurred</h4></div><?php }
}}
else{ ?><div class="formee-msg-info"><h3>Fill in all the details to add the debate.</h3></div><?php }
		?>
					<form method="post" class="formee" id="test" action="debate.php">
					<legend>Personal Information</legend>
<div class="grid-6-12">
<label>Issue debated<em class="formee-req">*</em></label><input type="text" id="name_Req" name="issue" ><br>
</div>
<div class="grid-6-12">
<label>Category<em class="formee-req">*</em></label><input type="text" name="category"><br>
</div>
<div class="grid-12-12">
<label>Debate description<em class="formee-req">*</em></label><textarea name="description" rows="4" cols="100"></textarea><br>
</div>
<div class="grid-6-12">
<label>Start Date<em class="formee-req">*</em></label><input type="date" name="start" placeholder="DD-MM-YYYY"><br>
</div>
<div class="grid-6-12">
<label>End Date<em class="formee-req">*</em></label><input type="date" name="end" placeholder="DD-MM-YYYY"><br>
</div>
<div class="grid-6-12">
<label>Proposition<em class="formee-req">*</em></label><input type="text"name="pro"><br>
</div>
<div class="grid-6-12">
<label>Opposition<em class="formee-req">*</em></label><input type="text" name="opp" ><br>
</div>

</fieldset>

<div class="grid-12-12">
<input class="right" name="submit" id="s9" type="submit"  value="Add" /> 
</div>
					
					</form>
				</div>

				
			</div>
		
		<div id="foot">
					<a href="#">Contact Me</a>
		</div>
	</body>
</html>
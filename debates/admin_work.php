<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add new Debate</title>

<link href="style.css" rel="stylesheet" />
<link href="css/style1.css" rel="stylesheet" />
<link href="css/remarks.css" rel="stylesheet"  />
<script type="text/javascript" src="jquery.min1.js"></script>
<script type="text/javascript" src="js/jquery.easyAccordion.js"></script>
<script type="text/javascript" src="js/utility.js"></script>
</head>

<body>
<div id="wrapper">

<div id="logo"><img src="images/logo.png" /></div>
    <div class="clear"></div>
<?php session_start(); ?>

<?php if (isset($_SESSION['user'])) { ?>
<p>Welcome back, <?= $_SESSION['user']; ?>!</p>
<div id="container2">
    <p style="color:blue;margin:10px 15px">Fill in Chrome only</p>       
    <form method="POST" action="admin_work.php">
    <label style="margin-right:150px;">Debate Topic</label>
    <input type="text" id="username" name="issue"><br />
    <label style="margin-right:118px;">Debate Description</label>
	<input type="text" id="username" name="description"><br />
    <label style="margin-right:175px;">Category</label>
	<input type="text" id="username" name="category"><br />
	<label style="margin-right:170px;">Start Date</label>
	<input type="date" id="username" name="start_date"><br />
    <label style="margin-right:174px;">End Date</label>
	<input type="date" id="username" name="end_date"><br />
    <label style="margin-right:25px;">Proposer's Name (His/Her User ID)</label>
	<input type="text" id="username" name="pro_userid"><br />
    <label style="margin-right:18px;">Moderator's Name (His/Her User ID)</label>
	<input type="text" id="username" name="mod_userid"><br />
    <label style="margin-right:30px;">Opposer's Name (His/Her User ID)</label>
	<input type="text" id="username" name="opp_userid"><br />
    <div id="lower">
    <input type="submit" value="Update">
    </div><!--/ lower-->
    </form>
    </div>
<?php } else {

header("Location:admin.php");
 } ?>
<?php
include 'config.php';
if(	  isset($_POST['issue']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['start_date']) && isset($_POST['end_date']) && 	      isset($_POST['pro_userid']) && isset($_POST['mod_userid']) && isset($_POST['opp_userid'])){
	session_start();
	$issue = mysql_real_escape_string($_POST['issue']);
	$description = mysql_real_escape_string($_POST['description']);
	$category = mysql_real_escape_string($_POST['category']);
	$start_date = mysql_real_escape_string($_POST['start_date']);
	$end_date = mysql_real_escape_string($_POST['end_date']);
	$pro_userid = mysql_real_escape_string($_POST['pro_userid']);
	$mod_userid = mysql_real_escape_string($_POST['mod_userid']);
	$opp_userid = mysql_real_escape_string($_POST['opp_userid']);
	
	if(!empty($issue) && !empty($description) && !empty($category) && !empty($start_date) && !empty($end_date) && !empty($pro_userid) && !empty($mod_userid) &&       !empty($opp_userid) )  
	{
		$query_pro = mysql_query(" SELECT id FROM members WHERE userid='$pro_userid' ");
		$query_mod = mysql_query(" SELECT id FROM members WHERE userid='$mod_userid' ");
		$query_opp = mysql_query(" SELECT id FROM members WHERE userid='$opp_userid' ");
		if( mysql_num_rows($query_pro) == 0 || mysql_num_rows($query_opp) == 0 || mysql_num_rows($query_mod) == 0){
			echo '<p style="color:blue;margin:10px 15px">No such record of proposer,moderator and opposer was found in our database.Please fill in the User IDs                   of  proposer,moderator and opposer properly.</p>';
		}
		else{
			$pro_id = mysql_fetch_assoc($query_pro);
			$opp_id = mysql_fetch_assoc($query_opp);
			$mod_id = mysql_fetch_assoc($query_mod);
			
			$proposition_id = $pro_id['id'];
			$moderator_id = $mod_id['id'];
			$opposition_id = $opp_id['id'];
			
			$insert = "INSERT INTO debates (issue,description,category,start_date,end_date,proposition_id,moderator_id,opposition_id) 
			           VALUES ('$issue','$description','$category','$start_date','$end_date','$proposition_id','$moderator_id','$opposition_id')";
					   
			if(!mysql_query($insert)){echo '<p style="color:red;margin:10px 15px">Could not insert query.Please try again</p>';}
			else{echo '<p style="color:blue;margin:10px 15px">Insertion complete.A record has been added</p>';}
		}
		
		 
	}
	else{echo '<p style="color:red;margin:10px 15px">Fill in all the fields</p>';}
	session_destroy();
}

else{echo mysql_error();}


?>
	
    



</div>

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
    	<center>Copyrights @ The Indian Umbrella 2013 <br /> * <a href="contact.html">Contact</a> * <a href=#>Privacy</a> * <a href=#>Terms of use</a> * <a href=#>Legal Disclaimer</a> * <a href=#>Help</a> *</center>   
</div>     
        
</body>
</html>
    

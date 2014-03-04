<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Login</title>

<link href="style.css" rel="stylesheet" />
<link href="css/style1.css" rel="stylesheet" />
<script type="text/javascript" src="jquery.min1.js"></script>
<script type="text/javascript" src="js/jquery.easyAccordion.js"></script>
<script type="text/javascript" src="js/utility.js"></script>
<link href="css/remarks.css" rel="stylesheet" />
</head>

<body>
<div id="wrapper">

<div id="logo"><img src="images/logo.png" /></div>
    <div class="clear"></div>

<?php
include 'config.php';
if( isset($_POST['userid'])  && isset($_POST['password']) && isset($_POST['debate']) )
{
	$userid = $_POST['userid'];
	$password = md5($_POST['password']);
	$debate = 2;
	
	if(!empty($userid) && !empty($password) && !empty($debate)){
		
		$query_debate = mysql_query("SELECT id,proposition_id,opposition_id,moderator_id FROM debates WHERE id='$debate' ");
		$debate_run = mysql_fetch_array($query_debate);
		$no=mysql_num_rows($debate_run);
$debate_id = $debate_run['id'];
		$pro_id = $debate_run['proposition_id'];
		$con_id = $debate_run['opposition_id'];
		$mod_id = $debate_run['moderator_id'];
		
		$query = "SELECT `id`,`userid` FROM `members` WHERE `userid`='$userid' AND `password`='$password' AND `validate`='1' ";
		
		if( $query_run = mysql_query($query)){
			$no_of_rows = mysql_num_rows($query_run); 
$vvk_run = mysql_fetch_array($query_run);   
			$user_id = $vvk_run['id'];
				$user_name = $vvk_run['userid'];
			if($no_of_rows == 0){echo 'Invalid userid/password';}
			
			else if($no_of_rows == 1){
				
				
				if($user_id == $pro_id){
					echo $debate_id;
				}
				else if($user_id == $con_id){
					session_start();
					header("Location: con.php");
				}
				else if($user_id == $mod_id){
					session_start();
					header("Location: mod.php ");
				}
				else{echo "you are not the admin";
}
			
			}
		}
		
		else{echo 'Query could not be inserted';}
		
	}
		
	else{echo 'Fill in all the fields';}
}


else{echo mysql_error();}

		
	
?>
	
    
        
    <div id="container">       
    <form method="POST" action="login1.php">
    
    <label>User ID</label>
    <input type="text" id="username" name="userid">
    
    <label>Password</label>
    <input type="password" id="password" name="password">
    
    <label>Debate</label>
    <select name="debate">
    <option value="Debate 1 topic">Debate 1 topic</option>
    <option value="Debate 2 topic">Debate 2 topic</option>
    <option value="Debate 3 topic">Debate 3 topic</option>
    </select>
    <a style="align:left;color:blue;text-decoration:none; margin-right:50px; margin-left:10px;font-size:15px;" href="updatepass.php">Reset Password</a>
<a style="align:left;color:blue;text-decoration:none;font-size:15px;" href="forgotpass.php">Forgot your Password?</a>    
<div id="lower">
    <input type="submit" value="Login">
    </div><!--/ lower-->
    </form>
    </div>
    
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
    
		
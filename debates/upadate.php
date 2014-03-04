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
define ("MAX_SIZE","400");
function getExtension($str) {

         $i = strrpos($str,".");
         if (!$i) { return ""; } 
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }
if(isset($_POST['userid']) && isset($_POST['password']) && isset($_POST['profession']) && isset($_POST['organisation']) && isset($_POST['contact']) && 
		isset($_POST['city']) ){
	$userid = $_POST['userid'];
	$password = $_POST['password'];
	$profession = md5($_POST['profession']);
	$organisation = $_POST['organisation'];	
	$contact = $_POST['contact'];
	$city = $_POST['city'];

	
	
	if(!empty($userid) && !empty($password) && !empty($profession) && !empty($organisation) && !empty($contact) && !empty($city) ){
		$query = mysql_query("SELECT profession,organisation,contact,city FROM members WHERE userid = '$userid' AND password = '$password' ");
		if(!$query){echo '<p style="margin-left:30px;color:red;">Query could not be inserted.Please try again.</p>';}
		else{
			if(mysql_num_rows($query) == 0){echo '<p style="margin-left:30px;color:red;">Invalid userid/password</p>';}
			else{
				//Image coding starts here
				
				$image =$_FILES["file"]["name"];
    			$uploadedfile = $_FILES['file']['tmp_name'];
						
						
				
				if($image){
						
						$filename = stripslashes($_FILES['file']['name']);
						$extension = getExtension($filename);
						$extension = strtolower($extension);
					    if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")){echo '<p style="margin-left:30px;color:red;"> Unknown Image extension</p> ';} 
						  
					    else{
						
						   $size=filesize($_FILES['file']['tmp_name']);
						 
							if ($size > MAX_SIZE*1024){echo '<p style="margin-left:30px;color:red;">You have exceeded the size limit</p>';}
							 
							if($extension=="jpg" || $extension=="jpeg" || $extension=="png" || $extension=="gif" )
							{
							$uploadedfile = $_FILES['file']['tmp_name'];
							$src = imagecreatefromjpeg($uploadedfile);
							}
							
							 
							list($width,$height)=getimagesize($uploadedfile);
							
							$newwidth=60;
							$newheight=($height/$width)*$newwidth;
							$tmp=imagecreatetruecolor($newwidth,$newheight);
							
							$newwidth1=25;
							$newheight1=($height/$width)*$newwidth1;
							$tmp1=imagecreatetruecolor($newwidth1,$newheight1);
							
							imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,
							 $width,$height);
							
							imagecopyresampled($tmp1,$src,0,0,0,0,$newwidth1,$newheight1, 
							$width,$height);
							
							$filename = "images/". $_FILES['file']['name'];
							$filename1 = "images/small". $_FILES['file']['name'];
							
							imagejpeg($tmp,$filename,100);
							imagejpeg($tmp1,$filename1,100);
							
							imagedestroy($src);
							imagedestroy($tmp);
							imagedestroy($tmp1);
							}//Image coding ends here
			
			
			
							$update = mysql_query("UPDATE members SET profession='$profession',organisation='$organisation',contact='$contact',city='$city' 							                                                   WHERE userid='$userid' ");
		
				}//Remove this bracket if delete image coding
				//Remove whole else if delete image coding
				else{
					$update = mysql_query("UPDATE members SET profession='$profession',organisation='$organisation',contact='$contact',city='$city' 							                                                   WHERE userid='$userid' ");
				}
		
			
		
				if(!$update){echo '<p style="margin-left:30px;color:red;">Your profile could not be updated.Please try again</p>';}
				else{echo '<p style="margin-left:30px;color:blue;">Insertion complete.Your profile has been updated.</p>';}
			}
		}
	}
	else{echo '<p style="margin-left:30px;color:red;">Fill in all the fields</p>';}
			
			
			
}

else{ echo mysql_error();}




?>
    
    
    
<div style="height:480px" id="container2">       
    <form method="POST" action="updateprofile.php">
    
    <label>User ID</label>
    <input type="text" id="username" name="userid" style="margin-left:100px;"><br />
    
    <label>Password</label>
    <input type="password" id="password" name="password" style="margin-left:88px;"><br />
    
    <label>Profession</label>
    <input type="text" id="username" name="profession" style="margin-left:83px;"><br />
    
    <label>Organisation</label>
    <input type="text" id="username" name="organisation" style="margin-left:69px;"><br />
    
    <label>Contact</label>
    <input type="text" id="username" name="contact" style="margin-left:103px;"><br />
    
    <label>City</label>
    <input type="text" id="username" name="city" style="margin-left:129px;"><br />

	<label>Upload image (Not necessary)</label>
    <input type="file" id="username" name="image" style="margin-left:30px;"><br />

    <div id="lower">
    <input type="submit" value="Update">
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
    

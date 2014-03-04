<?php
/*********************************************************************
* This script has been released with the aim that it will be useful.
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
* All Copy Rights Reserved by Vasplus Programming Blog
***********************************************************************/


//Validate the request brought
if(isset($_POST["page"]) && !empty($_POST["page"]))
{
	$user_name = trim(strip_tags(strtolower($_POST["usernames"])));
	$password = trim(strip_tags($_POST['passs']));
	$user_data_id=$_POST['user_id'];
	$encrypted_password = md5($password);
	$hash = md5( (rand(0,1000) )); 	
	if($user_name == "" || $password == "") //Be sure that all the fields are filled then proceed
	{
		echo "<div class='info'>Sorry, you have to fill in all the fields to proceed. Thanks.</div>";
	}
	else if(strlen($user_name) < 5)
	{
		echo "<div class='info'>Sorry, your username must not be less than 5 characters in length please. Thanks.</div>";
	}
	else if(ereg('[^A-Za-z0-9]', $user_name))  //Be sure that username is properly formatted then proceed
	{
		echo "<div class='info'>Sorry, <font color='blue'>".$user_name."</font> is not in the proper format for a username. <br>Username should only contain letters and numbers.<br>Example formats: <font color='blue'>comfort</font>, <font color='blue'>victor18</font>, <font color='blue'>chuks29</font>, <font color='blue'>lemdy</font>, <font color='blue'>joyce</font>, <font color='blue'>prisca</font>, <font color='blue'>ibrahim</font>, <font color='blue'>Ahmad</font> etc</div>";
	}
	else
	{
		include 'config.php';
		$sql=mysql_query("SELECT Name, Email FROM user_data WHERE ID='$user_data_id'");
		$row=mysql_fetch_array($sql);
		$name=$row['Name'];
		$email=$row['Email'];
		$s=mysql_query("SELECT * FROM members WHERE email='$email'");
		if(mysql_num_rows($s)==0){ 
		mysql_query("INSERT INTO members(name,email,userid,password,hash,user_data_id) VALUES('$name','$email','$user_name','$encrypted_password','$hash','$user_data_id')");
		$to      = $email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$name.'
------------------------

Please click this link to activate your account:

http://www.devilsnarewp7.com/v2.1/verify.php?email='.$email.'&hash='.$hash.'

'; // Our message above including the link
					
$headers = 'From:maskaravivek@gmail.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
}
else
{echo "<div class='info'>It seems you are already registered.</div>"; }
		?>
       <br clear="all"><br clear="all"><div class="vpb_main_wrapper" style="width:380px;"><br clear="all">
       
	   <div class="info" style="width:340px;float:left;">A confirmation mail has been sent to you with the activation link. Your registration details are!</div><br clear="all"><br clear="all">
        <div style="width:100px;float:left;" align="left">Username:</div>
        <div style="width:230px;float:left;" align="left"><?php echo $user_name; ?></div><br clear="all"><br clear="all">
        <div style="width:100px;float:left;" align="left">Email Address:</div>
        <div style="width:230px;float:left;" align="left"><?php echo $email; ?></div><br clear="all"><br clear="all">
     
        <br clear="all">
        
        </div><br clear="all">
        <?php
	}
}
else
{
	echo "<div class='info'>Sorry, the operation was unsuccessful.<br>Please try again or contact this website admin to report this error message if the problem persist. Thanks.</div>";
}
?>
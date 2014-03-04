<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Debates</title>
  <link rel="shortcut icon" href="http://theindianumbrella.com/debates/favicon.ico" type="image/x-icon" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika' rel='stylesheet' type='text/css'>
<link href="style.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Arizonia' rel='stylesheet' type='text/css'>
<link href="css/style1.css" rel="stylesheet" />
<link href="css/debates.css" rel="stylesheet" />
<link href="css/component_timeline.css" rel="stylesheet" />
<link rel="stylesheet" href="css/custom_heading.css" />
<link rel="stylesheet" type="text/css" href="css/default_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/header_nav.css" />
		<script src="js/modernizr.custom_nav.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika|Arizonia' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="style_archive.css">	
	<!--[if (gte IE 6)&(lte IE 8)]> 
		<script src="selectivizr.js"></script>
	<![endif]-->
	<style>
		/* Demo page only */
a{text-decoration:none;}
		
		#about{
		    color: #999;
		    text-align: center;
		    font: 0.9em Arial, Helvetica;
		}

		#about a{
		    color: #777;
		}
#logo_index{
	font-size:64px;
	font-weight:normal;
	text-align:center;
	text-decoration:none;
	text-shadow:1px 1px 2px #000000;
	font-family: 'Arizonia', cursive;
	line-height:50px;
	margin:10px;
	text-transform:none; 
}		
	</style>
	<style type="text/css">
 #share-buttons{
 margin-top:8px;}
#share-buttons img {
width: 35px;
padding-left: 5px;
padding-right: 5px;
padding-top: 15px;
border: 0;
box-shadow: 0;
display: inline;
}
 
    .myButton {
        
        -moz-border-radius:6px;
        -webkit-border-radius:6px;
        border-radius:6px;
       
        border:1px solid #dcdcdc;
        display:inline-block;
        color:#fff;
        font-family:arial;
        font-size:15px;
        padding:6px 24px;
        text-decoration:none;
        
    }
    .myButton:hover {
        
    }
    .myButton:active {
        position:relative;
        top:1px;
    }

</style>
    <script type="text/javascript">
	  var k = jQuery.noConflict();
k(function() {
k(".vote").click(function() 
{
var id = k(this).attr("id");
var name = k(this).attr("name");
var dataString = 'id='+ id ;
var parent = k(this);

if (name=='up')
{
k(this).fadeIn(200).html('Voted Yes');
k.ajax({
type: "POST",
url: "up_vote.php",
data: dataString,
cache: false,

success: function(data)
{
parent.html(html);
} 
});
}
else
{
k(this).fadeIn(200).html('Voted No');
k.ajax({
type: "POST",
url: "down_vote.php",
data: dataString,
cache: false,

success: function(data)
{
parent.html(html);
}
});
}
return false;
});
});
</script>
	
<link rel="stylesheet" type="text/css" href="ongoing.css">
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
								
							</ul>
						</nav>
					
						<div style="margin-top:-50px;float:right;margin-left:150px">
							<a style=":hover {text-decoration:none;}" href="../index.php" rel="home"><h1  id="logo_index">The Indian Umbrella</h1></a>
						</div>
						</div>
						</div>
						<div style="width:100%;float:right; margin-top:30px;margin-bottom:20px;">
					<div class="ct-header-items-right">
					
						
					<ul style="margin-top:0px; list-style-type: none;" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="images/Facebook.png"></a></li>
							<li><a href="http://www.twitter.com/indianumbrella"><img src="images/Twitter.png"></a></a></li>
							<li><a href="https://plus.google.com/u/0/104590234648482562614"><img src="images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>

	<div class="clear"></div>
  <div id="left">
    
   <div style="padding:10px;background-color:#aaa;"><h3 style="padding-left:10px;text-transform:none;font-size:20px;font-family: 'Open Sans', sans-serif;">Ongoing debates</h3></div> 
    <ul style="padding-left:10px;padding-right:5px;" class="cbp_tmtimeline">
<?php
include 'config.php';
$sql=mysql_query("select * from debates WHERE type='current' ORDER BY id DESC LIMIT 9");
while($row=mysql_fetch_array($sql))
{
$id=$row['id'];
$topic=$row['issue'];
$message=$row['description'];
$con_id=$row['opposition_id'];
$pro_id=$row['proposition_id'];
$s_date = new DateTime($row['start_date']);
$e_date = new DateTime($row['end_date']);
$start_date=$s_date->format('jS F Y');
$end_date=$e_date->format('jS F Y');
$start_time=$s_date->format('H:i');
$end_time=$e_date->format('H:i');
$debate_id=$row['id'];
$up=$row['up'];
$down=$row['down'];
$up_per=round(($up/($up+$down))*100,0);
$down_per=round(($down/($up+$down))*100,0);
$sql_pro = mysql_query(" SELECT members.name,user_data.Profession,user_data.Organisation,user_data.dp_link FROM members,user_data WHERE members.id='$pro_id' AND user_data.ID='$pro_id' ");
$sql_con = mysql_query(" SELECT members.name,user_data.Profession,user_data.Organisation,user_data.dp_link FROM members,user_data WHERE members.id='$con_id' AND user_data.ID='$con_id' ");
$row4 = mysql_fetch_array($sql_pro); 
				$row2 = mysql_fetch_array($sql_con);
				//$row3 = mysql_fetch_array($sql_mod);
				
					$pro_name = $row4['name'];
					$pro_designation=$row4['Profession'].", ".$row4['Organisation'];
					$pro_dp=$row4['dp_link'];
					$con_name = $row2['name'];
					$con_designation=$row2['Profession'].", ".$row2['Organisation'];
					$con_dp=$row2['dp_link'];
?>
<li>
<time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>Public Voting</span> <span><?php echo $up_per;?>% <span style="font-size:0.4em;">people agree</span></span></time>
	<div class="cbp_tmlabel">
	<h2 style="font-size:24px;font-family: 'Open Sans', sans-serif;"><a style="color:#fff" href="current_debate.php?id=<?php echo $id; ?>"><?php echo $topic; ?></a><span style="padding-top:10px;float:right;font-size:12px;"><?php echo $start_date;?> to <?php echo $end_date;?></span></h2>
	<p style="font-size:18px;font-family: 'Open Sans', sans-serif;"><?php echo $message; ?><br/>
	<span style="margin-top:5px;">
	Proposition: <a style="color:#fff;text-transform:capitalize;" href="#" title="<?php echo $pro_designation; ?>"><?php echo $pro_name; ?></a>
	Opposition: <a style="color:#fff;text-transform:capitalize;" href="#" title="<?php echo $con_designation; ?>"><?php echo $con_name; ?></a>
	</span>
	<div id="share-buttons">
 <span style="padding-top:10px;">Share</span>
<!-- Facebook -->
<span >
<a href="http://www.facebook.com/sharer.php?u=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
 
<!-- Twitter -->
<a href="http://twitter.com/share?url=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>&text=<?php echo $topic; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
 
<!-- Google+ -->
<a href="https://plus.google.com/share?url=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/google.png" alt="Google" /></a>
 </span>
 <span style="float:right;padding-top:10px;"><a style="color:#fff;" class="myButton" href="current_debate.php?id=<?php echo $id; ?>">Enter this debate</a></span>
</div>
	</p>
	</div>
</li>
<?php } ?>
</ul>
    
    
    
</div>

	<div id="right">
     <div style="padding:10px;background-color:#aaa;"><h3 style="padding-left:10px;text-transform:none;font-size:20px;font-family: 'Open Sans', sans-serif;">News & Events</h3></div> 
	<div style="padding-left:15px;padding-right:15px;padding-top:12px; margin-bottom:10px;">
    <?php
  include('rssclass1.php');
  $feedlist = new rss('http://devilsnarewp7.com/vg/test/vvk.xml');
  echo $feedlist->display(5,"9lessons");
 ?> </div>
	</div>
	
    
    <div class="clear"></div>
    
    
    
    
    
    
        <div style="padding:10px;background-color:#aaa;"><h3 style="padding-left:10px;text-transform:none;font-size:20px;font-family: 'Open Sans', sans-serif;">Upcoming Debates</h3></div> 
        <div class="clear"></div>
     <div style="width:90%;margin-left:25px;">     <ul style="margin-left:-100px;" class="cbp_tmtimeline">
<?php
include 'config.php';
$sql=mysql_query("select * from debates WHERE type='new' ORDER BY id DESC LIMIT 9");
while($row=mysql_fetch_array($sql))
{
$topic=$row['issue'];
$message=$row['description'];
$s_date = new DateTime($row['start_date']);
$e_date = new DateTime($row['end_date']);
$start_date=$s_date->format('jS F Y');
$end_date=$e_date->format('jS F Y');
$start_time=$s_date->format('H:i');
$end_time=$e_date->format('H:i');
$debate_id=$row['id'];
$debate_id=$row['id'];
$up=$row['up'];
$down=$row['down'];
$up_per=round(($up/($up+$down))*100,2);
$down_per=round(($down/($up+$down))*100,2);
?>
<li>
<time class="cbp_tmtime" datetime="2013-04-10 18:30"><span>Starts on</span> <span style="font-size:1.2em"><?php echo $start_date;?></span></time>
	<div class="cbp_tmlabel">
	<h2 style="font-size:24px;font-family: 'Open Sans', sans-serif;"><?php echo $topic; ?><span style="padding-top:10px;float:right;font-size:12px;"><?php echo $start_date;?> to <?php echo $end_date;?></span></h2>
	<p style="font-size:18px;font-family: 'Open Sans', sans-serif;"><?php echo $message; ?><br/>
	Proposition: <a style="color:#fff;text-transform:capitalize;" href="#" title="<?php echo $pro_designation; ?>"><?php echo $pro_name; ?></a>
	Opposition: <a style="color:#fff;text-transform:capitalize;" href="#" title="<?php echo $con_designation; ?>"><?php echo $con_name; ?></a>
	<div id="share-buttons">
 Share
<!-- Facebook -->
<span>
<a href="http://www.facebook.com/sharer.php?u=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
 
<!-- Twitter -->
<a href="http://twitter.com/share?url=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>&text=<?php echo $topic; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
 
<!-- Google+ -->
<a href="https://plus.google.com/share?url=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/google.png" alt="Google" /></a>
 </span>
 </div>
	</p>
	</div>
</li>
<?php } ?>
</ul>
</div>    	 

    
    
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
		</footer>
    
    
</div>

        </body>
		</html>

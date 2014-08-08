<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Archives</title>

<link href="style.css" rel="stylesheet" />
<link href="css/style1.css" rel="stylesheet" />
<link href="ongoing.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js"></script>

<script type="text/javascript">
$(function() {
//More Button
$('.more').live("click",function() 
{
var ID = $(this).attr("id");
if(ID)
{
$("#more"+ID).html('<img src="moreajax.gif" />');

$.ajax({
type: "POST",
url: "ajax_more.php",
data: "lastmsg="+ ID, 
cache: false,
success: function(html){
$("ol#updates").append(html);
$("#more"+ID).remove();
}
});
}
else
{
$(".morebox").html('The End');

}


return false;


});
});

</script>
<script type="text/javascript" src="js/jq1.js"></script>
	  <script type="text/javascript" src="js/jquery.easyAccordion.js"></script>
      <script type="text/javascript" src="js/utility.js"></script>
	<style type="text/css">
	 /*
		  html{font-size:62.5%}
		  body{font-size:1.2em;color:#294f88}
		  h1{margin:0 0 20px 0;padding:0;font-size:2em;}
		  h2{margin:40px 0 20px 0;padding:0;font-size:1.6em;}
		  p{font-size:1.2em;line-height:170%;margin-bottom:20px}
		*/  		  
		 body
{
font-family:Arial, 'Helvetica', sans-serif;
color:#000;
font-size:15px;

}
a { text-decoration:none; color:#0066CC}
a:hover { text-decoration:underline; color:#0066cc }
*
{ margin:0px; padding:0px }
ol.timeline
	{ list-style:none}ol.timeline li{ position:relative;border-bottom:1px #dedede dashed; padding:8px; }ol.timeline li:first-child{}
	.morebox
	{
	font-weight:bold;
	color:#333333;
	text-align:center;
	border:solid 1px #333333;
	padding:8px;
	margin-top:8px;
	margin-bottom:8px;
	-moz-border-radius: 6px;-webkit-border-radius: 6px;
	}
	.morebox a{ color:#333333; text-decoration:none}
	.morebox a:hover{ color:#333333; text-decoration:none}
	#container{margin-left:60px; width:580px }
	
		/* UNLESS YOU KNOW WHAT YOU'RE DOING, DO NOT CHANGE THE FOLLOWING RULES */
		.easy-accordion h2{margin:0px 0 20px 0;padding:0;font-size:1.6em;}
		.easy-accordion{display:block;position:relative;overflow:hidden;padding:0;margin:0}
		.easy-accordion dt,.easy-accordion dd{margin:0;padding:0}
		.easy-accordion dt,.easy-accordion dd{position:absolute}
		.easy-accordion dt{margin-bottom:0;margin-left:0;z-index:5;/* Safari */ -webkit-transform: rotate(-90deg); /* Firefox */ -moz-transform: rotate(-90deg);-moz-transform-origin: 20px 0px;  /* Internet Explorer */ filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);cursor:pointer;}
		.easy-accordion dd{z-index:1;opacity:0;overflow:hidden}
		.easy-accordion dd.active{opacity:1;}
		.easy-accordion dd.no-more-active{z-index:2;opacity:1}
		.easy-accordion dd.active{z-index:3}
		.easy-accordion dd.plus{z-index:4}
		.easy-accordion .slide-number{position:absolute;bottom:0;left:10px;font-weight:normal;font-size:1.1em;/* Safari */ -webkit-transform: rotate(90deg); /* Firefox */ -moz-transform: rotate(90deg);  /* Internet Explorer */ filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);}
		 
		/* FEEL FREE TO CUSTOMIZE THE FOLLOWING RULES */
		#wrapper{z-index:50}
		dd p{line-height:120%}
		#recentcomments{font-size:14px}
		#accordion-1{float:right;width:600px;height:150px;background:#fff; margin-right:50px}
		#accordion-1 dl{width:600px;height:160px}	
		#accordion-1 dt{height:46px;line-height:44px;text-align:right;padding:0 15px 0 0;font-size:0.8em;font-weight:bold;font-family: Tahoma, Geneva, sans-serif;text-transform:uppercase;letter-spacing:1px;background:#fff url(images/slide-title-inactive-1.jpg) 0 0 no-repeat;color:#26526c}
		#accordion-1 dt.active{cursor:pointer;color:#fff;background:#fff url(images/slide-title-active-1.jpg) 0 0 no-repeat}
		#accordion-1 dt.hover{color:#68889b;}
		#accordion-1 dt.active.hover{color:#fff}
		#accordion-1 dd{padding:25px;background:url(images/slide.jpg) bottom left repeat-x;border:1px solid #dbe9ea;border-left:0;margin-right:3px}
		#accordion-1 .slide-number{color:#68889b;left:10px;font-weight:bold}
		#accordion-1 .active .slide-number{color:#fff;}
		#accordion-1 a{color:#68889b}
		#accordion-1 dd img{float:right;margin:0 0 0 30px;}
		#accordion-1 h2{font-size:2.5em;margin-top:10px}
		#accordion-1 .more{padding-top:10px;display:block}
			
		

      </style>
</head>

<body>
<div id="wrapper">

	
    
    <div id="logo"><img src="images/logo.png" /></div>
    <div id="accordion-1">
            <dl>
                <dt>About</dt>
                <dd><h4>The Indian Umbrella is so and so</h4><br><a href="#" class="more">Read more</a></p></dd>
                <dt>Debates</dt>
                <dd><h4>Check out whats going on</h4><br><a href="#" class="more">Upcoming debates</a></p></dd>
                <dt>Blogs</dt>
                <dd><h4>Visit our blogs</h4><br><a href="#" class="more">Read more</a></p></dd>
                <dt>Interviews</dt>
                <dd><h4>See who we have got this week for you</h4><br /><a href="#" class="more">Read more</a></p></dd>
                <dt>Conferences</dt>
                <dd><h4>Our latest conferences</h4><br /><a href="#" class="more">Read more</a></p></dd>
                <dt>Join Us</dt>
                <dd><h4>Check what we are up to..</h4><br /><a href="#" class="more">Read more</a></p></dd>
				
			</dl>
        
    </div>		

        
    		
   
	<div class="clear"></div>


	<div class="clear"></div>
               
    <div id="current_debate">
    
    <p>Archived Debates</p>
    </div>
    
    <div class="clear"></div>
     
   <div id='container'>
<ol class="timeline" id="updates">
<?php
include 'config.php';
$sql=mysql_query("select * from debates ORDER BY id DESC LIMIT 9");
while($row=mysql_fetch_array($sql))
{
$topic=$row['issue'];
$message=$row['description'];
$end_date=$row['end_date'];
?>
<li>
<div class="main">
	<div class="boxed">
		<div class="box1">
			<div class="up">Yes</div>
			<div class="down">No</div>
		</div>
		<div class="box2">
			<div class="topic"><b><?php echo $topic; ?></b></div>
			<div class="description"><b><?php echo $message; ?></b></div>
		</div>
		<div class="status">End date: <?php echo $end_date; ?></div>
	</div>
	<div class="pro">
		<div class="pro_img"><center><img id="image" src="images/d127_mcafee_sm0.jpg" /></center></div>
		<div><center>Proposition</center></div>
	</div>
	<div class="con">
		<div class="con_img"><center><img id="image" src="images/d127_mcafee_sm0.jpg" /></center></div>
		<div><center>Opposition</center></div>
	</div>
</div>
</li>
<?php } ?>
</ol>
<div id="more<?php echo $topic; ?>" class="morebox">
<a href="#" class="more" id="<?php echo $topic; ?>">more</a>
</div>
</div>
    


</div>
<div id="footer">
<div class="wrapper">
					<ul id="icons">
						<li><a href="#" class="normaltip" title="Facebook"><img src="images/icon1.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Delicious"><img src="images/icon2.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Stumble Upon"><img src="images/icon3.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Twitter"><img src="images/icon4.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Linkedin"><img src="images/icon5.png" alt=""></a></li>
						<li><a href="#" class="normaltip" title="Reddit"><img src="images/icon6.png" alt=""></a></li>
					</ul>
				</div>
    	<center>Copyrights @ The Indian Umbrella 2013 <br />* <a href=#>About</a> * <a href=#>Privacy</a> * <a href=#>Terms of use</a> * <a href=#>Legal Disclaimer</a> * <a href=#>Help</a> *  
</div>     
        

</body>
</html>
<?php 
require_once "includes/functions.php";
include('config.php');
if(!empty($_GET["id"]))$debate_id=$_GET["id"];
else $debate_id=2;
$sql1=mysql_query("SELECT * FROM  debates WHERE id='$debate_id' and type='current'");
$num_rows = mysql_num_rows($sql1);
if($num_rows==1)
{
$row1=mysql_fetch_array($sql1);
$issue=$row1['issue'];
$phase=$row1['status'];
$s_date = new DateTime($row1['start_date']);
$e_date = new DateTime($row1['end_date']);
$start_date=$s_date->format('jS F Y');
$end_date=$e_date->format('jS F Y');
$desc=$row1['description'];
$pro_id=$row1['proposition_id'];
$con_id=$row1['opposition_id'];
$mod_id=$row1['moderator_id'];
$up=$row1['up'];
$down=$row1['down'];
$up_per=round(($up/($up+$down))*100,2);
$down_per=round(($down/($up+$down))*100,2);
$up_per_add=round((($up+1)/($up+$down+1))*100,2);
$down_per_add=round((($down+1)/($up+$down+1))*100,2);

$sql_pro = mysql_query(" SELECT members.name,user_data.Profession,user_data.Organisation,user_data.dp_link FROM members,user_data WHERE members.id='$pro_id' AND user_data.ID='$pro_id' ");
$sql_con = mysql_query(" SELECT members.name,user_data.Profession,user_data.Organisation,user_data.dp_link FROM members,user_data WHERE members.id='$con_id' AND user_data.ID='$con_id' ");
//$sql_mod = mysql_query(" SELECT members.name,user_data.Profession,user_data.Organisation,user_data.dp_link FROM members,user_data WHERE members.id='$mod_id' AND user_data.ID='$mod_id' ");
		}	
?>
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
<title>
<?php 
if($issue!=null) echo $issue;
else
echo "Current Debate";
 ?>

</title>
  <link rel="shortcut icon" href="http://devilsnarewp7.com/vg/favicon.ico" type="image/x-icon" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Jura|Amaranth|Signika:300|Arizonia' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/default.css" />
	<link rel="stylesheet" href="css/custom_heading.css" />
    <script src="js/jquery-1.2.6.pack.js" type="text/javascript"></script>
    <script src="js/myScript.js" type="text/javascript"></script>
    <link href="style.css" rel="stylesheet" />
    <link href="css/style1.css" rel="stylesheet" />
    <link href="css/style2.css" rel="stylesheet" />
 <link href="css/footer_nav.css" rel="stylesheet" />
 <link rel="stylesheet" type="text/css" href="css/default_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/component_nav.css" />
		<link rel="stylesheet" type="text/css" href="css/header_nav.css" />
		<script src="js/modernizr.custom_nav.js"></script>
		  <script type="text/javascript" src="js/jq1.js"></script>
    <script type="text/javascript" src="js/jquery.easyAccordion.js"></script>
 <link rel="stylesheet" href="css/formee-structure.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/formee-style.css" type="text/css" media="screen" />  
      <script type="text/javascript">
	  var g=$.noConflict();
g(document).ready(function()
{
g(".like").click(function()
{
var id=g(this).attr("id");
var name=g(this).attr("name");
var dataString = 'id='+ id + '&name='+ name;
g("#votebox").slideDown("slow");

g("#flash").fadeIn("slow");

g.ajax
({
type: "POST",
url: "rating.php",
data: dataString,
cache: false,
success: function(html)
{
g("#flash").fadeOut("slow");
g("#content_rate").html(html);
} 
});
});

g(".close").click(function()
{
g("#votebox").slideUp("slow");
});

});
</script>


	<link rel="stylesheet" href="css/screen.css" type="text/css" media="all" />
	<style type="text/css">
#share-buttons img {
width: 35px;
padding-left: 2px;
padding-right: 2px;
padding-top: 2px;
border: 0;
box-shadow: 0;
display: inline;
}
		#logo_index{
	font-size:64px;
	font-weight:normal;
	text-decoration:none;
	text-shadow:3px 3px 5px #000000;
	font-family: 'Arizonia', cursive;
	line-height:50px;
	margin-top:10px;
	margin-right:15px;
	float:right;
	text-transform:none; 
}


      </style>
	  <style type="text/css">

    .myButton {
        
        -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
        -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
        box-shadow:inset 0px 1px 0px 0px #ffffff;
        
        background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf));
        background:-moz-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
        background:-webkit-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
        background:-o-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
        background:-ms-linear-gradient(top, #ededed 5%, #dfdfdf 100%);
        background:linear-gradient(to bottom, #ededed 5%, #dfdfdf 100%);
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf',GradientType=0);
        
        background-color:#ededed;
        
        border:1px solid #dcdcdc;
        
        display:inline-block;
        color:#777777;
        font-family:arial;
        font-size:15px;
        font-weight:bold;
        padding:9px 24px;
        text-decoration:none;
        
        text-shadow:0px 1px 0px #ffffff;
        
    }
    .myButton:hover {
        text-decoration:none;
    }
    .myButton:active {
        position:relative;
        top:1px;
		text-decoration:none;
    }

</style>
	  <link href="debate_home.css" rel="stylesheet" />
	  <link rel='stylesheet' href='css/style_aside.css'>
	
	
	<script src="js/modernizr.custom.80028.js"></script>
	  <link rel="stylesheet" type="text/css" href="poll.css">
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
	var f=$.noConflict();
		 f("#fake").click(function() {
		  f("html").toggleClass("csstransforms");
		 });
	</script>
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
								<li><a href="http://www.theindianumbrella.com/contact.html">Contact</a></li>
							</ul>
						</nav>
					
						<div style="margin-top:-50px;float:right;margin-left:150px">
							<a style=":hover {text-decoration:none;}" href="../index.php" rel="home"><h1 id="logo_index">The Indian Umbrella</h1></a>
						</div>
						</div>
						</div>
						<div style="width:100%;float:right; margin-top:30px;margin-bottom:20px;">
					<div class="ct-header-items-right">
					
						
					<ul style="margin-top:0px" class="ct-connect">
							<li><a href="http://www.facebook.com/theindianumbrella"><img src="images/Facebook.png"></a></li>
							<li><a href="http://www.twitter.com/indianumbrella"><img src="images/Twitter.png"></a></a></li>
							<li><a href="https://plus.google.com/u/0/104590234648482562614"><img src="images/googleplus.png"></a></li>
								</ul>	
					</div></div><!--/ct-header-items-right-->

				</div><!-- ct-inner -->
			</header>
	<?php 
	if($num_rows==1)
	{
			if(!$sql_pro || !$sql_con){}
			
			else{
				
				$row4 = mysql_fetch_array($sql_pro); 
				$row2 = mysql_fetch_array($sql_con);
				//$row3 = mysql_fetch_array($sql_mod);
				
					$pro_name = $row4['name'];
					$pro_designation=$row4['Profession'].", ".$row4['Organisation'];
					$pro_dp=$row4['dp_link'];
					$con_name = $row2['name'];
					$con_designation=$row2['Profession'].", ".$row2['Organisation'];
					$con_dp=$row2['dp_link'];
					//$mod_name = $row3['name'];
					//$mod_designation=$row3['Profession'].", ".$row3['Organisation'];
					//$mod_dp=$row3['dp_link'];
}
$opening_cnt=mysql_num_rows(mysql_query("SELECT comment FROM comments WHERE debate_id='$debate_id' AND comment_type='1'"));
$rebuttal_cnt=mysql_num_rows(mysql_query("SELECT comment FROM comments WHERE debate_id='$debate_id' AND comment_type='2'"));					
$closing_cnt=mysql_num_rows(mysql_query("SELECT comment FROM comments WHERE debate_id='$debate_id' AND comment_type='3'"));
					?>
   <div style="padding:10px;background-color:#aaa;"><h3 style="text-transform:none;font-size:20px;font-family: 'Signika', sans-serif;">Current Debate<span style="text-transform:none;font-size:16px;font-family: 'Signika', sans-serif;float:right;"><?php echo $start_date;?> to <?php echo $end_date;?></span></h3></div> 
    <div class="clear"></div>
     <div id="debate_topic" style="width:60%;float:left;">

<script type="text/javascript">
 $.noConflict();
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
 $.noConflict(true);
try {
var pageTracker = _gat._getTracker("UA-8632327-1");
pageTracker._trackPageview();
} catch(err) {}</script> <div style="margin-top:30px;margin-left:30px;">
            	<h3 style="text-transform:uppercase;font-size:48px;font-family: 'Signika', sans-serif;"><?php echo $issue; ?></h3>
            	<p style="text-transform:capitalize;font-size:20px;font-family: 'Signika', sans-serif;"><?php echo $desc; ?><br/>
				<div id="share-buttons">
 <span style="padding-top:2px;font-size:20px;">Share</span>
<!-- Facebook -->
<span >
<a href="http://www.facebook.com/sharer.php?u=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $id; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" /></a>
 
<!-- Twitter -->
<a href="http://twitter.com/share?url=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $debate_id; ?>&text=<?php echo $issue; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" /></a>
 
<!-- Google+ -->
<a href="https://plus.google.com/share?url=http://www.theindianumbrella.com/debates/current_debate.php?id=<?php echo $debate_id; ?>" target="_blank"><img src="http://www.simplesharebuttons.com/images/somacro/google.png" alt="Google" /></a>
 </span>
 </div>
				</p>
        	</div>
        
    </div>
	<div style="float:left; width:25%">
<aside><h3>Public Voting</h3>
<h2 style="font-size:14px; margin:10px">Do you agree with the motion?</h2>
<p style="font-size:12px; margin:12px" >You can change your vote any number of times before the moderator announces the winner.</p>
<a href="#" class="like myButton" id="1" style="margin:4px" name="up">Agree</a><a href="#" class="like myButton" id="1" name="down">Disagree</a>
<div id="votebox">
<span id='close'><a href="#votebox" class="close" title="Close This">X</a></span>
<div style="height:13px">
<div id="flash">Loading........</div>
</div>
<div id="content_rate">



</div>

</div>
</aside>
	</div>
	
       <div id="voting_sides">
        <div style="padding:10px;margin-bottom:10px;background-color:#aaa;" ><h3 style="font-family: 'Signika', sans-serif;">Representing the sides</h3></div>  
       <div style="margin-left:15px;margin-right:15px">
	   <div style="float:left;width:100%;margin-left:35px;" id="phase">
	   <button <?php if($phase==1){ ?> style="width:30%;background: #aaa;"<?php }else{ ?> style="width:30%;"<?php } ?> class="myButton"><a href="current_debate_full.php?id=<?php echo $debate_id; ?>&type=1" style="color:#000">Opening(<?php echo $opening_cnt; ?>)</a></button>
	   <button <?php if($phase==2){ ?> style="width:30%;background: #aaa;"<?php }else{ ?> style="width:30%;"<?php } ?> class="myButton"><a style="color:#000" <?php if($phase>1){ ?> href="current_debate_full.php?id=<?php echo $debate_id; ?>&type=2"<?php } ?> >Rebuttal(<?php echo $rebuttal_cnt; ?>)</a></button>
	   <button <?php if($phase==3){ ?> style="width:30%;background: #aaa;"<?php }else{ ?> style="width:30%;"<?php } ?> class="myButton"><a style="color:#000"<?php if($phase>2){ ?> href="current_debate_full.php?id=<?php echo $debate_id; ?>&type=3" <?php } ?> >Closing(<?php echo $closing_cnt; ?>)</a></button></div>	
   
		
		<div id="defend" style=" width:300px">
		   <aside style="min-height:250px;">
		   <h3>Proposition</h3>
            <h4 style="text-transform:capitalize;font-size:20px;font-family: 'Signika', sans-serif;"><?php echo $pro_name; ?></h4>
			<h5 style="text-transform:capitalize;font-size:16px;font-family: 'Signika', sans-serif;"><?php echo $pro_designation; ?></h5>
             <?php
$debate_id=$_GET['id'];
$user="pro";
$sql=mysql_query("select comment from comments WHERE debate_id='$debate_id' AND user_id='$pro_id' AND comment_type='$phase' ORDER BY comment_id DESC LIMIT 1");
$row_pro=mysql_fetch_array($sql);
$cmnt=$row_pro['comment'];
?>
<p class="para_text" ><img src="<?php echo $pro_dp; ?>" style="float:left; margin: 0 5px 0 0;" /><?php echo $cmnt ?><a href="current_debate_full.php?id=<?php echo $debate_id ?>&type=0">View More</a></p>
</aside>
		</div><div id="defend" style=" width:300px">
		  <aside style="min-height:250px;">
		  <h3>Opposition</h3>
            <h4 style="text-transform:capitalize;font-size:20px;font-family: 'Signika', sans-serif;"><?php echo $con_name; ?></h4>
			<h5 style="text-transform:capitalize;font-size:16px;font-family: 'Signika', sans-serif;"><?php echo $con_designation; ?></h5>
             <?php
$debate_id=$_GET['id'];
$user="pro";
$sql=mysql_query("select comment from comments WHERE debate_id='$debate_id' AND user_id='$con_id' AND comment_type='$phase' ORDER BY comment_id DESC LIMIT 1");
$row_opp=mysql_fetch_array($sql);
$cmnt=$row_opp['comment'];
?>
<p class="para_text"><img src="<?php echo $con_dp; ?>" style="float:left; margin: 0 5px 0 0;" /><?php echo $cmnt ?><a href="current_debate_full.php?id=<?php echo $debate_id ?>&type=0">View More</a></p>
</aside>
		</div>
        <div style="margin:10px;float:left;width:280px">
        <aside style="min-height:250px;"><h3>Background Reading</h3>
  		  <?php
  include('rssclass.php');
  $feedlist = new rss('http://devilsnarewp7.com/vg/test/vvk.xml');
  echo $feedlist->display(5,"9lessons");
  ?> 
</aside>
</div></div>
    </div>
   
		       
	    
    
    <div id="comments">
    	<div style="padding:10px;margin-bottom:10px;background-color:#aaa;"><h3 style="font-family: 'Signika', sans-serif;">Comments from the floor</h3></div>
		<div style="margin-left:15px;margin-right:15px">
		 <p style="margin-top:10px;margin-left:50px;"><span id="s9"><a class="myButton" href="current_debate_full.php?id=<?php echo $debate_id ?>&type=0">Add your view</a></span> <span class="s10"><a class="myButton" href="current_debate_full.php?id=<?php echo $debate_id ?>&type=0">View all</a></span></p>
         
         <hr />
        
        <div id="recentcomments" class="dsq-widget">
		<div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'theindumb'; // required: replace example with your forum shortname
		var disqus_identifier = 'debate<?php echo $debate_id; ?>';
    var disqus_title = '<?php echo $issue; ?>';
        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a></div>
        <br />
        
         
        
        
        <div id="clear"></div>
        
        
       
        
        
        <div class="clear"></div>

        
        
        
    </div>  </div>   
        <?php } else{
		function js_redirect($url, $seconds)
{
    echo "<script language=\"JavaScript\">\n";
    echo "<!-- hide code from displaying on browsers with JS turned off\n\n";
    echo "function redirect() {\n";
    echo "window.parent.location = \"" . $url . "\";\n";
    echo "}\n\n";
    echo "timer = setTimeout('redirect()', '" . ($seconds*1000) . "');\n\n";
    echo "-->\n";
    echo "</script>\n";

    return true;
}
 ?> <div class="formee-msg-error"><h4>This debate is over. You will be redirected to debates home.</h4></div><?php
js_redirect("index.php",5);
		} ?>
    <div class="clear">
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
						<span>&copy; The Indian Umbrella 2013 by</span><br/> 
						<a href="http://theindianumbrella.com">The Indian Umbrella</a><br/>
						
					</div>	
				</div>
			</div>
		</footer>
   <script src="js/classie_nav.js"></script>
		<script src="js/uisearch_nav.js"></script>
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>   
    
</div>    
</body>
</html>
		
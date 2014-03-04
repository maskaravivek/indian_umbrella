<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=manage.php");
}
else
header("Location: login.php?url=manage.php");
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
		
<link rel="stylesheet" href="../css/table_style.css" />

	</head>
	<body>
	<?php
	$old_p=$_GET['old_p'];
	$new_p=$_GET['new_p'];
	$debate_id=$_GET['id'];
	$act=$_GET['action'];
	if($act=="update_phase")
	{
			mysql_query("UPDATE debates SET status='$new_p' WHERE id='$debate_id'");
	}
	else if($act == "end")
	{
			mysql_query("UPDATE debates SET type='past' WHERE id='$debate_id' ");
	}
	else if($act == "start")
	{
			mysql_query("UPDATE debates SET type='current' WHERE id='$debate_id' ");
	}
	?>
	
		
					<h1 id="head" style="width:90%;margin:auto;">The Indian Umbrella<span style="float:right;">Welcome, <?php echo $name;?> <a href="logout.php">Logout</a></span></h1>
		
		<ul id="navigation" style="width:90%;margin:auto;">
			<li><a href="index.php">Overview</a></li>
			<li><a href="manage.php">Debates</a></li>
			<li><a href="users.php">Registered Users</a></li>
		</ul>
		
			<div id="tablewrapper" style="width:90%;margin:auto;">
		<div id="tableheader" style="width:80%;margin:auto;">
        	<div class="search">
                <select id="columns" onchange="sorter.search('query')"></select>
                <input type="text" id="query" onkeyup="sorter.search('query')" />
            </div>
            <span class="details">
				<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div>
        		<div><a href="javascript:sorter.reset()">reset</a></div>
        	</span>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
            <thead>
                <tr>
                    <th class="nosort"><h3>ID</h3></th>
					<th><h3>Issue</h3></th>
					<th><h3>Sch. Start date</h3></th>
					<th><h3>Sch. End date</h3></th>
					<th><h3>Actions</h3></th>
					<th><h3>Background Reading</h3></th>
                </tr>
            </thead>
            <tbody>
<?php 
include '../config.php';
$result=mysql_query("SELECT * FROM debates WHERE type='new' OR type='current' ORDER BY id DESC");

$cnt=1;
while($row=mysql_fetch_array($result))
{
$id=$row['id'];
$issue=$row['issue'];
$start=$row['start_date'];
$end=$row['end_date'];
$phase=$row['status'];
$type=$row['type'];

?>
<tr>
<td><?php echo $id ?></td>
<td><?php echo $issue; ?></td>
<td><?php echo $start; ?></td>
<td><?php echo $end; ?></td>
<td>
<?php
if($type=="new") { ?>
<a href="manage.php?id=<?php echo $id; ?>&old_p=1&new_p=1&action=start">Start debate(opening)</a><?php } 
else if($type=="current")
{
if($phase==1){ ?>
<a href="manage.php?id=<?php echo $id; ?>&old_p=1&new_p=2&action=update_phase">Start rebuttal</a> <?php }
else if($phase==2){ ?>
<a href="manage.php?id=<?php echo $id; ?>&old_p=2&new_p=3&action=update_phase">Start closing</a><?php }
else if($phase==3){ ?>
<a href="manage.php?id=<?php echo $id; ?>&old_p=3&new_p=3&action=end">End debate</a><?php }
}?>
</td>
<td>
<a href="bg_reading.php?debate_id=<?php echo $id; ?>">Add background reading</a>
</td>
</tr>
<?php $cnt=$cnt+1;

}
?>
            </tbody>
        </table>
        <div id="tablefooter" style="width:80%;margin:auto;">
          <div id="tablenav">
            	<div>
                    <img src="images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
                    <img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
                    <img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
                    <img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
                </div>
                <div>
                	<select id="pagedropdown"></select>
				</div>
                <div>
                	<a href="javascript:sorter.showall()">view all</a>
                </div>
            </div>
			<div id="tablelocation">
            	<div>
                    <select onchange="sorter.size(this.value)">
                    <option value="5">5</option>
                        <option value="10" selected="selected">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span>Entries Per Page</span>
                </div>
                <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div>
            </div>
        </div>
    </div>

		
		<div id="foot">
					<a href="#">Contact Me</a>
				
		</div>
		<script type="text/javascript" src="../js/script_admin.js"></script>
	<script type="text/javascript">
	var sorter = new TINY.table.sorter('sorter','table',{
		headclass:'head',
		ascclass:'asc',
		descclass:'desc',
		evenclass:'evenrow',
		oddclass:'oddrow',
		evenselclass:'evenselected',
		oddselclass:'oddselected',
		paginate:true,
		size:10,
		colddid:'columns',
		currentid:'currentpage',
		totalid:'totalpages',
		startingrecid:'startrecord',
		endingrecid:'endrecord',
		totalrecid:'totalrecords',
		hoverid:'selectedrow',
		pageddid:'pagedropdown',
		navid:'tablenav',
		sortcolumn:1,
		sortdir:1,
		
		init:true
	});
  </script>
	</body>
</html>
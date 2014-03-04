<?php session_start();
include '../config.php';
if(isset($_SESSION['user_id']))
{
$name=$_SESSION['name'];
$id=$_SESSION['user_id'];
$query=mysql_query("SELECT * FROM members where id='$id' AND user_level=4");
$no=mysql_num_rows($query);
if($no==0)
header("Location: login.php?url=users.php");
}
else
header("Location: login.php?url=users.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>The Indian Umbrella Admin</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
		
<link rel="stylesheet" href="../css/table_style.css" />
	</head>
	<body>
		
					<h1 id="head" style="width:90%;margin:auto;">The Indian Umbrella<span style="float:right;">Welcome, <?php echo $name;?> <a href="logout.php">Logout</a></span></h1>
		
		<ul id="navigation" style="width:90%;margin:auto;">
			<li><a href="index.php">Overview</a></li>
			<li><a href="manage.php">Debates</a></li>
			<li><span class="active">Registered Users</span></li>
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
					<th><h3>Username</h3></th>
					<th><h3>Name</h3></th>
					<th><h3>Gender</h3></th>
					<th><h3>Profession</h3></th>
					<th><h3>Organisation</h3></th>
					<th><h3>Contact</h3></th>
					<th><h3>City</h3></th>
					<th><h3>Email</h3></th>
					<th><h3>Resume</h3></th>
                </tr>
            </thead>
            <tbody>
<?php 
include '../config.php';
$result=mysql_query("SELECT members.id,members.userid,user_data.Name,user_data.Gender,user_data.Profession,user_data.Organisation,user_data.College,user_data.State_in_degree,user_data.Contact,user_data.City,user_data.Email,user_data.resume_link FROM members, user_data WHERE members.id=user_data.ID;");
$cnt=1;
while($row=mysql_fetch_array($result))
{
$id=$row['id'];
$userid=$row['userid'];
$name=$row['Name'];
$sex=$row['Gender'];
$prof=$row['Profession'];
$org=$row['Organisation'];
if($prof==null){$prof="Student";$org=$row['College'];}
$contact=$row['Contact'];
$email=$row['Email'];
$city=$row['City'];
$resume=$row['resume_link'];
?>
<tr>
<td><?php echo $id ?></td>
<td><?php echo $userid ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $sex; ?></td>
<td><?php echo $prof; ?></td>
<td><?php echo $org; ?></td>
<td><?php echo $contact; ?></td>
<td><?php echo $city; ?></td>
<td><?php echo $email; ?></td>
<td><a href="<?php echo $resume;?>" >Download</a></td>
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
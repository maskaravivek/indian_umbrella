<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Applications</title>
<link rel="stylesheet" href="css/table_style.css" />
<style>
.masked{
		font-size:48px;
background: url(images/paint.png) repeat, white;
-webkit-text-fill-color: transparent;
-webkit-background-clip: text;
-webkit-animation-name: masked-animation;
-webkit-animation-duration: 40s;
-webkit-animation-iteration-count: infinite;
-webkit-animation-timing-function: linear;
}
@-webkit-keyframes masked-animation {
0% {background-position: left bottom;}
100% {background-position: right bottom;}
}
</style>
<link rel="stylesheet" href="css/custom_heading.css" />
<!--lightbox-->
<script type="text/javascript" src="js/jquery_delete.js"></script>

 <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "php_scripts/delete_app.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</head>
<body>
<div class= "masked"><strong><center>THE INDIAN UMBRELLA</center></strong></div>
<div style=" margin:50px 10px 10px 10px" class="my_custom_heading"><h3 style="font-size:18px">Admin Panel-Application forms</h3></div>


      <div id="tablewrapper">
		<div id="tableheader">
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
					<th><h3>Name</h3></th>
					<th><h3>Gender</h3></th>
					<th><h3>Profession</h3></th>
					<th><h3>Organisation</h3></th>
					<th><h3>Contact</h3></th>
					<th><h3>City</h3></th>
					<th><h3>Email</h3></th>
					<th><h3>Resume</h3></th>
					<th><h3>Type</h3></th>
					<th><h3>Status</h3></th>
                </tr>
            </thead>
            <tbody>
<?php 
include 'config.php';
$result=mysql_query("SELECT applications.user_data_id,applications.application_type,applications.status,user_data.Name,user_data.Gender,user_data.Profession,user_data.Organisation,user_data.College,user_data.State_in_degree,user_data.Contact,user_data.City,user_data.Email,user_data.resume_link FROM applications, user_data WHERE applications.user_data_id=user_data.ID;");
$cnt=1;
while($row=mysql_fetch_array($result))
{
$id=$row['user_data_id'];
$type=$row['application_type'];
$status=$row['status'];
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
<td><input type="checkbox" name="select[]" id="select[]" value="<?php echo $id ?>"></td>
<td><?php echo $name; ?></td>
<td><?php echo $sex; ?></td>
<td><?php echo $prof; ?></td>
<td><?php echo $org; ?></td>
<td><?php echo $contact; ?></td>
<td><?php echo $city; ?></td>
<td><?php echo $email; ?></td>
<td><a href="<?php echo $resume;?>" >Download</a></td>
<td><?php echo $type; ?></td>
<td><?php echo $status ?></td>
</tr>
<?php $cnt=$cnt+1;
}
?>
            </tbody>
        </table>
        <div id="tablefooter">
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

	<script type="text/javascript" src="js/script_admin.js"></script>
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
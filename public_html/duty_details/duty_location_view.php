<?php 
$this_page='duty_details';
include '../../includes/check.php';

include '../../includes/open_db.php';
if(!empty($_POST))
{
	$query1="select * from duty_location";
	$result1=mysql_query($query1) or die("query failed <br/>".mysql_error());
	while ($row1 = mysql_fetch_array($result1))
	{
		if(isset($_POST[$row1['loc_id']]))
		{
			$temp=mysql_query("delete from duty_location where loc_id=$row1[loc_id] ") or die(mysql_error());
		}
	}

}

$query="select * from duty_location";
$result=mysql_query($query) or die("query failed <br/>".mysql_error());
$no_row=mysql_num_rows($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html" charset=utf-8 " />
<link rel="stylesheet" type="text/css" href="../../styles/view.css" />
<title>Duty Detail</title>

<script type="text/javascript">

function edit(str)
{
	var fr=document.getElementById("pop");
	fr.src="duty_location_new.phpx?id="+str;
	fr.style.display="inline";
	document.getElementById("myform").style.visibility="hidden";	
	document.getElementById("header").style.visibility="hidden";	
}

</script>
</head>

<body>
	<div id="header">
		<?php include_once '../../includes/menu.php';?>
		<br><br><br><br>
	</div>
	<div id="form1">
		<iframe id="pop" src="about:blank" name="pop" scrolling="no" style="margin:0em 18em auto; width:42em; height:20em;"></iframe>
			<form id='myform' name='myform' action="#"	method='post' accept-charset='UTF-8'>
			<fieldset>
				<legend>
					<strong>Duty Location [View]</strong>
				</legend>
				<div id="tbl">
					<table border="1" cellspacing="1">
						<tbody>
							<tr colspan="4">
								<b>Duty Location Details</b>
							</tr>
							<tr>
								<th width="30"><input class='s_button' type='image'
									src='../../img/delete.png' alt='Delete' /></th>
								<th width="400">Loc Code</th>
								<th width="400">Location Description</th>
								<th width="30"><a href="../duty_location_new"> <img
										class="s_button" src="../../img/add.png" width="30"
										height="30">
								
								</a></th>
							</tr>
							<?php 
							while ($row = mysql_fetch_array($result))
							{
								echo "<tr>";
								echo "<td><input type='checkbox' name=$row[loc_id] /></td>";
								echo "<td id=$row[loc_id]c >$row[loc_code]</td>";
								echo "<td id=$row[loc_id]d >$row[loc_description]</td>";
								echo "<td><a href=\"#\"><img id=$row[loc_id] class='s_button' src='../../img/edit.png' alt='Edit' width=30 height=30 onclick=\"edit(this.id)\" /></td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
			</fieldset>
		</form>
	</div>
	<?php mysql_close($link); ?>
</body>
</html>

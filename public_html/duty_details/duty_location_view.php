<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	include '../../includes/open_db.h';
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
		<link rel="stylesheet" type="text/css" href="../../styles/style.css" />
		<title>Duty Detail</title>
		
		<script type="text/javascript">
			function edit(str)
			{
				var code=prompt("Enter new Location Code (max 10 characters)");
				var desc=prompt("Enter new Location Description (max 50 characters)");
				if(code && desc)
				{
					var values=str+"~^"+code+"~^"+desc;
					var code_id=str+'c';
					var desc_id=str+'d';
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","edit_duty_loc.php?values="+values,true);
					xmlhttp.send();
					xmlhttp.onreadystatechange=function()
					{
						var pre_code1=xmlhttp.responseText;
						code1= pre_code1.split("~^");
						document.getElementById(code_id).textContent=code1[0];
						document.getElementById(desc_id).textContent=code1[1];
		
					}
				}
			}
		</script>
	</head>

	<body>
		<div>
			<?php include_once '../../includes/menu.php';?>
			<br><br><br><br>
		</div>
		<div id="form1" style="width:60em;">
			<form id='login' action="duty_location_view.php" method='post' accept-charset='UTF-8'>
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
									<th width="30"><input class='s_button' type='image' src='../../img/delete.png' alt='Delete' /></th>
									<th width="400">Loc Code</th>
									<th width="400">Location Description</th>
									<th width="30"><a href="duty_location_new.php"> <img class="s_button" src="../../img/add.png" width="30" height="30"></a></th>
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

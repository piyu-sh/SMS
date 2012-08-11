<?php 
	$this_page='duty_details';
include '../../includes/check.php';

	include 'open_db.php';
	if(!empty($_POST))
	{
		$query1="select * from duty_facilitation";
		$result1=mysql_query($query1) or die(mysql_error());
		$j=0;
		while ($row1 = mysql_fetch_array($result1)) {
			if(isset($_POST[$row1['facility_id']]))
			{
				$temp=mysql_query("delete from duty_facilitation where facility_id=$row1[facility_id] ") or die(mysql_error());
			}
		}
	}
	$query="select * from duty_facilitation";
	$result=mysql_query($query) or die(mysql_error());
	$no_row=mysql_num_rows($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="view.css" />
		<title>Duty Detail</title>
		
		<script type="text/javascript">
			function edit(str)
			{
				var facility=prompt("Enter new FACILITY");
				if(facility)
				{
					var values=str+"~^"+facility;
					var new_facility=str+'f';
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","edit_facilitation.php?values="+values,true);
					xmlhttp.send();
					xmlhttp.onreadystatechange=function()
					{
						var fac = xmlhttp.responseText;
						document.getElementById(new_facility).textContent=fac;
					}
				}
			}
		</script>
	</head>
	<body>
		<div>
			<?php include_once 'menu.php';?>
			<br><br><br><br>
		</div>
		<div id="form1" style="width:60em;">
			<form id='login' action="#" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Facilitation Types [View]</strong>
					</legend>
					<div id="tbl">
						<table border="1" cellspacing="2">
							<tbody>
								<tr colspan="5">
									<b>Facilitation And Security Details</b>
								</tr>
								<tr>
									<th width="30"><input type='image' class="s_button" src='img/delete.png' alt='Search' /></th>
									<th width="400">Facility</th>
									<th width="400">Facility Type</th>
									<th width="400">Sub Facility Type</th>
									<th width="30"><a href="facilitation_and_security_new.php" ><img class="s_button" height=30 width=30 src='img/add.png' alt='Search' /></a></th>
								</tr>
								<?php 
									while ($row = mysql_fetch_array($result))
									{
										echo "<tr>";
										echo "<td><input type='checkbox' name=$row[facility_id] /></td>";
										echo "<td id=$row[facility_id]f >$row[facility]</td>";
										echo "<td id=$row[facility_id]t >$row[facility_type]</td>";
										echo "<td id=$row[facility_id]s >$row[sub_facility_type]</td>";
										echo "<td><a href=\"#\"><img class='s_button' id=$row[facility_id] src='img/edit.png' alt='edit' width=25 height=25 onclick=\"edit(this.id)\" /></td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
				</fieldset>
			</form>
		</div>
	</body>
</html>
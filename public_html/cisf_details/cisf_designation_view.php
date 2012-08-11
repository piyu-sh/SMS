<?php 
	$this_page='cisf_details';
include '../../includes/check.php';

	include 'open_db.php';
	if(!empty($_POST))
	{
		$query1="select * from  cisf_designation";
		$result1=mysql_query($query1) or die("query failed <br/>".mysql_error());
		while ($row1 = mysql_fetch_array($result1)) 
		{
			if(isset($_POST[$row1['desig_id']]))
			{
				$temp=mysql_query("delete from  cisf_designation where desig_id=$row1[desig_id] ") or die(mysql_error());
			}
		}
	}
	$query="select * from cisf_designation";
	$result=mysql_query($query) or die("query failed <br/>".mysql_error());
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="view.css" />
		<title>CISF Detail</title>
		
		<script type="text/javascript">
			function edit(str)
			{
				var code=prompt("Enter new Designation Code (max 10 characters)");
				var desc=prompt("Enter new Designation Description (max 50 characters)");
				if(code && desc)
				{
					var values=str+"~^"+code+"~^"+desc;
					var code_id=str+'c';
					var desc_id=str+'d';
					var xmlhttp=new XMLHttpRequest();
					xmlhttp.open("GET","edit_cisf_desig.php?values="+values,true);
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
            <?php include_once 'menu.php';?>
			<br/><br/><br/><br/>
        </div>
		<div id="form1" style="width:60em;">
			<form id='login' action="#" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>CISF Designation [View]</strong>
						
					</legend>
					<div id="tbl">
						<table border="1" cellspacing="2" >
							<tbody>
								<tr>
									<th width="30"><input class='s_button' type='image' src='img/delete.png' alt='Delete' width=30 height=30/></th>
									<th width="400">Designation Code</th>
									<th width="400">Designation Description</th>
									<th width="30"><a href="cisf_designation_new.php"> <img class="s_button" src="img/add.png" width=30 height=30></th>
								</tr>
								<?php 
									while ($row = mysql_fetch_array($result))
									{
										echo "<tr>";
										echo "<td><input type='checkbox' name=$row[desig_id] /></td>";
										echo "<td id=$row[desig_id]c >$row[desig_code]</td>";
										echo "<td id=$row[desig_id]d >$row[desig_description]</td>";
										echo "<td><a href=\"#\"><img id=$row[desig_id] class='s_button' src='img/edit.png' alt='Edit' width=30 height=30 onclick=\"edit(this.id)\" /></td>";
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
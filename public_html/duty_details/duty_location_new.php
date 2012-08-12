<?php $this_page='duty_details';
include '../../includes/check.php';

if(!empty($_POST))
{
	include '../../includes/open_db.php';
	$loc_code=$_POST["loc_code"];
	$loc_description=$_POST["loc_description"];
	$loc_remarks=$_POST["loc_remarks"];
	$query="insert into duty_location(`loc_code`,`loc_description`,`loc_remarks`) values('$loc_code','$loc_description','$loc_remarks')";
	$result=mysql_query($query) or die(mysql_error());
	mysql_close($link);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset=utf-8 " />
		<link rel="stylesheet" type="text/css" href="../../styles/style.css" />	
		<title>Duty Detail</title>	
		
		<script type="text/javascript">
			function validateForm()
			{
				var x=document.getElementById("loc_code");
				var y=document.getElementById("loc_description");
				if ((x.value==null || x.value=="")||(y.value==null || y.value==""))
				{
					alert("Feilds marked * are mandatory");
					return false;
				}
			}
		</script>
	</head>

	<body>
		<div>
			<?php include_once '../../includes/menu.php';?>
			<br /><br /><br /><br />
		</div>
		<div id="form1" style="width:32em; height:20em;" >
			<form name='myform' action="duty_location_new.php" onsubmit="return validateForm()" method='post' accept-charset='UTF-8'>
				<fieldset>
					<legend>
						<strong>Duty Location [New]</strong>
					</legend>
					<div id="tbl">
						<table>
							<tbody>
								<tr>
									<th></th>
									<th></th>
								</tr>
								<tr>
									<td><label for='loc_code'>*Loc Code</label></td>
									<td><input type='text' id="loc_code" name='loc_code' maxlength="10" style="margin-left:2em;"/></td>
								</tr>
								<tr>
									<td><label for='loc_description'>*Description</label></td>
									<td><input type='text' id="loc_description" name='loc_description' maxlength="50" style="margin-left:2em; width:17em;"/></td>
								</tr>
								<tr>
									<td><label for='loc_remarks'> Remarks</label></td>
									<td><textarea id="loc_remarks" name="loc_remarks" rows='3' cols='26' style="margin-left:2em; resize:none; width:17em; overflow-y:auto;"></textarea></td>
								</tr>
								<tr>
									<td colspan="2">
										<a href="duty_area_search.php"><img class="s_button" src="../../img/search.png" alt="Search" width="30" height="30" /></a>
										<input type='submit' name='Save' value='Save' /> 
										<input type='reset' name='Clear' value='Clear' />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</fieldset>
			</form>
			<?php 
			if(!empty($_POST))
			{
				echo '<br/><br/><p style="text-align:center; font-size:1.5em; color:#0078ff;"><strong>Database updated</strong></p>';
			}
			?>
		</div>
	</body>
</html>
